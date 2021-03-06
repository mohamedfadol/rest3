@extends('theme.default')

@section('heading')
{{ __('message.Menus') }}
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
        <a class="btn btn-primary" href="{{ route('menu.create') }}">
                <i class="material-icons">add</i>{{ __('message.Add New Menu') }} </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">{{ __('message.Menus') }}</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="menus-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Menu Name') }}</th>
                                <th>{{ __('message.Description') }}</th>
                                <th>{{ __('message.Categories') }}</th>
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)
                            <tr>
                                <td>{{$menu->name}}</td>
                                <td>{{$menu->description}}</td>

                                <td>@foreach($menu->categories as $category)
                                <span>{{ $category->name }}</span>  | 
                                @endforeach
                                </td>
                                <td class="text-right">
                                    <a href="{{route('menu.edit' ,$menu->id)}}" 
                                        class="btn btn-success btn-sm edit">{{ __('message.edit') }}</a>
                                    <form action="{{route('menu.destroy' ,$menu->id)}}" 
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
        $('#menus-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
            searchPlaceholder: "Search",
        }
      });
    });
</script>

@endsection