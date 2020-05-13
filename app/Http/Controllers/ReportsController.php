<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Floor;
use App\Table;
use App\Order;
use App\Branch;
use App\Product;
use App\BillKind;
use App\Payment;
use App\Category;
use Carbon\Carbon;
use App\ActivityLog;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\LazyCollection;

class ReportsController extends Controller
{
    public function getFloors(Request $request, $id)
    {
        if($request->ajax()) {
            return response()->json([
                'floors' => Branch::find($id)->floors
            ]);
        }
    }

    public function getTables(Request $request, $id)
    {
        if($request->ajax()) {
            return response()->json([
                'tables' => Floor::find($id)->tables
            ]);
        }
    }

    public function getBranchEmployees(Request $request, $id)
    {
        if($request->ajax()) {
            return response()->json([
                'employees' => Branch::find($id)->employees
            ]);
        }
    }

    public function getFloorEmployees(Request $request, $id)
    {
        if($request->ajax()) {
            return response()->json([
                'employees' => Floor::find($id)->employees
            ]);
        }
    }

    public function getProducts(Request $request, $id)
    {
        if($request->ajax()) {
            return response()->json([
                'products' => Category::find($id)->products
            ]);
        }
    }

    public function fetchOrders(Request $request) {
        if ($request->table != "all") 
            $orders = Table::find($request->table)->orders();
        elseif ($request->floor != "all") 
            $orders = Floor::find($request->floor)->orders();
        elseif ($request->branch != "all") 
            $orders = Branch::find($request->branch)->orders();
        else 
            $orders = Order::latest();

        $orders->whereBetween('orders.created_at', [$request->from, $request->to])
            ->whereIn('paymentType', $request->payment_types)
            ->whereIn('bill_id', $request->order_types);
 
        if ($request->employee != "all")
            $orders->where('addByUserId', $request->employee);
        
        return $orders->cursor(); 
    }

    public function dailyOrders()
    {
        $branches = Auth::user()->branches;
        $orderTypes = Auth::user()->billKind;
        $paymentTypes = Auth::user()->payments;
        $request = null;
        return view('reports.daily-orders', compact('branches', 'orderTypes','paymentTypes', 'request'));
    }
    
    public function dailyOrdersResponse(Request $request)
    {        
        $orders = $this->fetchOrders($request);

        $branches = Auth::user()->branches;
        $orderTypes = Auth::user()->billKind;
        $paymentTypes = Auth::user()->payments;
        return view('reports.daily-orders', compact('branches', 'orderTypes' ,'orders','paymentTypes', 'request'));
    }

    public function productsSales()
    {
        $branches = Auth::user()->branches;
        $orderTypes = Auth::user()->billKind;
        $categories = Auth::user()->categories;
        $paymentTypes = Auth::user()->payments;
        $request = null;
        return view('reports.products-sales', compact('branches', 'orderTypes','paymentTypes', 'request', 'categories'));
    }

    public function productsSalesResponse(Request $request)
    {
        $orders = $this->fetchOrders($request);

        $products = LazyCollection::make(function () use ($orders) {
            foreach($orders as $order)
                yield $order->products;
        });
        
        $products = $products->flatten()->groupBy('id');
        
        if ($request->sku != null)
            $products = $products->only(Product::whereSku($request->sku)->value('id'));

        if ($request->product != 'all') {
            $products = $products->only($request->product);
        } elseif ($request->category != 'all') {
            $category = $request->category;
            $products = $products->filter(function ($value, $key) use ($category) {
                return Category::find($category)->products->contains('id', $key);
            });
        }
        
        $branches = Auth::user()->branches;
        $orderTypes = Auth::user()->billKind;
        $categories = Auth::user()->categories;
        $paymentTypes = Auth::user()->payments;

        return view('reports.products-sales', compact('branches', 'orderTypes' ,'paymentTypes','products', 'categories', 'request'));
    }

    public function categoriesSales()
    {
        $branches = Auth::user()->branches;
        $orderTypes = Auth::user()->billKind;
        $categories = Auth::user()->categories;
        $paymentTypes = Auth::user()->payments;
        $request = null;
        return view('reports.categories-sales', compact('branches', 'orderTypes','paymentTypes', 'request', 'categories'));
    }

    public function categoriesSalesResponse(Request $request)
    {
        $orders = $this->fetchOrders($request);

        $categories = collect();

        foreach($orders as $order) {
            $categories->push($order->products);
        }
        $categories = $categories->flatten()->groupBy('category_id');

        if ($request->category != 'all') {
            $categories = $categories->only($request->category);
        }
        
        $categories->transform(function($category) {
            return $category->groupBy('id');
        });

        foreach($categories as $key => $category) {
            $total = 0;
            foreach($category as $product) {
                $product->put('totalQuantity', $product->sum('pivot.Qty'));
                $total += $product->sum('pivot.Qty') * $product->first()->price;
            }
            $category->put('category', Category::find($key));
            $category->put('total', $total);
        }

        $result = $categories;

        $branches = Auth::user()->branches;
        $orderTypes = Auth::user()->billKind;
        $categories = Auth::user()->categories;
        $paymentTypes = Auth::user()->payments;

        return view('reports.categories-sales', compact('branches', 'orderTypes' ,'paymentTypes','result', 'categories', 'request'));
    }

    public function totalSales()
    {
        $branches = Auth::user()->branches;
        $orderTypes = Auth::user()->billKind;
        $paymentTypes = Auth::user()->payments;
        $request = null;
        return view('reports.total-sales', compact('branches', 'orderTypes', 'paymentTypes','request'));
    }

    public function totalSalesResponse(Request $request)
    {
        $orders = $this->fetchOrders($request);
        $orders = $orders->groupBy(function ($order) {
            return Carbon::parse($order->updated_at)->toDateString();
        });
        
        $branches = Auth::user()->branches;
        $orderTypes = Auth::user()->billKind;
        $paymentTypes = Auth::user()->payments;
        
        return view('reports.total-sales', compact('branches', 'orderTypes', 'paymentTypes','orders', 'request'));
    }

    public function ingredientsSales()
    {
        $branches = Auth::user()->branches;
        $orderTypes = Auth::user()->billKind;
        $paymentTypes = Auth::user()->payments;
        $request = null;
        return view('reports.ingredients-sales', compact('branches', 'orderTypes','paymentTypes', 'request'));
    }

    public function ingredientsSalesResponse(Request $request)
    {
        $orders = $this->fetchOrders($request);
        
        $products = collect();
        foreach($orders as $order) {
            $products->push($order->products);
        }
        $products = $products->flatten()->groupBy('id');

        $products->each(function($product, $id) {
            $product->put('totalQuantity', $product->sum('pivot.Qty'));
            $product->put('ingredients', Product::find($id)->ingredients);
            $product['ingredients']->each(function ($ingredient) use ($product) {
                $ingredient->pivot->quantity *= $product['totalQuantity'];
            });
        });

        $ingredients = collect();
        foreach($products as $id => $product) {
            $ingredients->push($product['ingredients']);
        }
        $ingredients = $ingredients->flatten()->groupBy('id');

        $ingredients->each(function ($ingredient) {
            $ingredient->put('totalQuantity', $ingredient->sum('pivot.quantity'));
        });

        $branches = Auth::user()->branches;
        $orderTypes = Auth::user()->billKind;
        $paymentTypes = Auth::user()->payments;

        return view('reports.ingredients-sales', compact('branches', 'orderTypes', 'paymentTypes','request', 'ingredients'));
    }

    public function log() 
    {
        $users = Auth::user()->employees->sortBy('name')->prepend(Auth::user());
        $request = null;
        return view('reports.log', compact('users', 'request'));
    }

    public function logResponse(Request $request)
    {       
        $users = Auth::user()->employees->sortBy('name')->prepend(Auth::user());
        return view('reports.log', compact('users', 'request'));
    }

    public function drawLogTable(Request $request)
    {
        $users = Auth::user()->employees->sortBy('name')->prepend(Auth::user());

        if ($request->user !== 'all')
            $activities = ActivityLog::where('causer_id', $request->user);
        else
            $activities = ActivityLog::whereIn('causer_id', $users->pluck('id'));

        $activities->whereBetween('created_at', [$request->from, $request->to]);

        $activities = $activities->cursor();
        // $activities = ActivityLog::cursor();

        return Datatables::of($activities->all())
            ->addColumn('name', function(ActivityLog $activity) {
                return User::find($activity->causer_id)->name;
            })
            ->addColumn('description', function(ActivityLog $activity) {
                return $activity->description;
            })
            ->addColumn('subject_type', function(ActivityLog $activity) {
                return $activity->subject_type;
            })
            ->addColumn('date', function(ActivityLog $activity) {
                return $activity->created_at;
            })
            ->addColumn('properties', function(ActivityLog $activity) {
                return '<pre>' 
                    . json_encode(json_decode($activity->properties), JSON_PRETTY_PRINT) 
                    . '</pre>';
            })
            ->rawColumns(['properties'])
            ->toJson();
    }
}

