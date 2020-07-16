@extends('theme.default')

@section('heading')
{{ __('message.Categories') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{ route('category.create') }}">
                <i class="material-icons">add</i>{{ __('message.Add New Category') }} </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">category</i>
                </div>
                <h4 class="card-title"><th>{{ __('message.Categories') }}</th></h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="categories-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Icon') }}</th>
                                <th>{{ __('message.Category Name') }}</th>
                                <th>{{ __('message.SKU') }}</th>
                                <th>{{ __('message.Parent Category') }}</th>
                                <th>{{ __('message.From') }}</th>
                                <th>{{ __('message.To') }}</th>
                                <th>{{ __('message.Active') }}</th>
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($categories as $category) 
                                <tr>
                                    <td width="9%">
                                    <img class="img-thumbnail" 
                                        src="{{ URL::asset('/storage/'.$branchname.'/category/'.$category->image) }}">
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
                                        <a href="{{route('category.edit' ,$category->id)}}" 
                                                class="btn btn-success btn-sm edit">
                                            {{ __('message.edit') }}</a>
                                    <form action="{{route('category.destroy' ,$category->id)}}" 
                                                method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('message.delete') }}</button>
                                    </form>
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