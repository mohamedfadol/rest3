@extends('theme.default')

@section('heading')
Products
@endsection

@section('head')
<style>
    .table thead tr th {
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{ route('product.create') }}"><i class="material-icons">add</i> Add New Product</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant_menu</i>
                </div>
                <h4 class="card-title">Products</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="products-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Class Product</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Selling Type</th>
                                <th>Tax</th>
                                <th>Active</th>
                                <th>Modifires</th> 
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        @if(count($products) > 0 )
                            <tbody>
                                    @foreach($products as $product)
                                <tr>
                                        <td width="9%">
                                        <img class="img-thumbnail" 
                                            src="data:image/jpg;base64,{!!$product->image->image!!}">
                                        </td>
                                        <td>{{ $product->nameAr}}</td>
                                        <td>{{ $product->descriptionAr}}</td>
                                        <td>{{ $product->sku}}</td>
                                        <td>{{ $product->category->name}}</td>
                                        <td>{{ $product->class->nameAr}}</td>
                                        <td>{{ $product->timedEventFrom}}</td>
                                        <td>{{ $product->timedEventTo}}</td>
                                        @if($product->price == '0')
                                        <td> Open</td>
                                        @else
                                        <td>{{ $product->price}}</td>
                                        @endif
                                        <td>{{ $product->sellType}}</td>
                                        <td>{{ $product->tax}}</td>
                                        <td>{{ $product->active}}</td>
                                        <td>@foreach($product->modifires as $modifire)
                                            <span>{{ $modifire->nameAr}} </span> |
                                            @endforeach
                                        </td>

                                        <td class="text-right">
                                            <a 
                                                href="{{route('product.edit',$product->id)}}" 
                                                    class
                                                    ="btn btn-link btn-info btn-just-icon edit">
                                                    <i class="material-icons">edit</i></a>
                                            <a 
                                                href="{{route('product.destroy',$product->id)}}" 
                                                    class
                                                    ="btn btn-link btn-danger btn-just-icon remove">
                                                    <i class="material-icons">delete</i></a>
                                        </td>
                                </tr>
                                    @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#products-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
      });
    });
</script>

@endsection