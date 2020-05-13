@extends('theme.default')

@section('heading')
ingredients
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
        <a class="btn btn-primary" href="{{ route('ingredient.create') }}"><i class="material-icons">add</i> Add New ingredient</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">kitchen</i>
                </div>
                <h4 class="card-title">ingredients</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="ingredients-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Arabic Name</th> 
                                <th>English Name</th>
                                <th>Note</th>
                                <th>Sku</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        @if(count($ingredients) > 0 )
                        <tbody>
                            @foreach($ingredients as $ingredient)
                            <tr>
                                <td>{{ $ingredient->nameAr}}</td>
                                <td>{{ $ingredient->nameEn}}</td>
                                <td>{{ $ingredient->note}}</td>
                                <td>{{ $ingredient->sku}}</td>
                                <td>{{ $ingredient->unit}}</td>
                                <td>{{ $ingredient->price}}</td>
                                <td class="text-right">
                                    <a 
                                        href="{{route('ingredient.edit',$ingredient->id)}}" 
                                            class
                                            ="btn btn-link btn-info btn-just-icon edit">
                                            <i class="material-icons">edit</i></a>
                                    <a 
                                        href="{{route('ingredient.destroy',$ingredient->id)}}" 
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
        $('#ingredients-table').DataTable({
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