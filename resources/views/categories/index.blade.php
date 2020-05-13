@extends('theme.default')

@section('heading')
Categories
@endsection

@section('content')
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{ route('category.create') }}"><i class="material-icons">add</i> Add New Category</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">Categories</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="categories-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Parent Category</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Active</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td width="9%">
                                    <img class="img-thumbnail" 
                                        src="data:image/jpg;base64,{!!$category->image->image!!}">
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->sku }}</td>
                                    @if($category->cat_id == '')
                                    <td>Parent Category</td> 
                                    @else
                                    <td>{{ $category->parent->name}}</td> 
                                    @endif
                                    <td>{{ $category->timedEventFrom }}</td>
                                    <td>{{ $category->timedEventTo }}</td>
                                    <td>{{ $category->active ? 'Active' : 'Not Active' }}</td>
                                    <td class="text-right">
                                        <a href="{{route('category.edit' ,$category->id)}}" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i></a>
                                        <a href="{{route('category.destroy' ,$category->id)}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
        $('#categories-table').DataTable({
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