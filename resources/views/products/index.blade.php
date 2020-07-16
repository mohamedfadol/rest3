@extends('theme.default')

@section('heading')
{{ __('message.Products List') }}
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
        <a class="btn btn-primary" href="{{ route('product.create') }}">
            <i class="material-icons">add</i>{{ __('message.Add New Product') }} </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant_menu</i>
                </div>
                <h4 class="card-title">{{ __('message.Products List') }}</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="products-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Icon') }}</th>
                                <th>{{ __('message.Product Arabic Name') }}</th>
                                <th>{{ __('message.Description') }}</th>
                                <th>{{ __('message.SKU') }}</th>
                                <th>{{ __('message.Category') }}</th>
                                <th>{{ __('message.Class Product') }}</th>
                                <th>{{ __('message.From') }}</th>
                                <th>{{ __('message.To') }}</th>
                                <th>{{ __('message.Price') }}</th>
                                <th>{{ __('message.Selling Type') }}</th>
                                <th>{{ __('message.Tax') }}</th>
                                <th>{{ __('message.Active') }}</th>
                                <th>{{ __('message.modifires') }}</th> 
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>
                        @if(count($products) > 0 )
                            <tbody>
                                    @foreach($products as $product)
                                <tr>
                                        <td width="9%">
                                        <img class="img-thumbnail" 
                                            src="{{ URL::asset('/storage/'.$branchname.'/product/'.$product->image) }}">
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
                                                    ="btn btn-success btn-sm edit">
                                                    {{ __('message.edit') }}</a>
                                    <form action="{{route('product.destroy' ,$product->id)}}" 
                                                method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm remove">{{ __('message.delete') }}</button>
                                    </form>
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
            dom: 'Bfrtip',
            buttons: ['print'],
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