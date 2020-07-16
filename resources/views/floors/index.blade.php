@extends('theme.default')

@section('heading')
{{ __('message.Floors') }}
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
        <a class="btn btn-primary" href="{{ route('floor.create') }}">
            <i class="material-icons">add</i>{{ __('message.Add New Floor') }} </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title">{{ __('message.Floors') }}</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="floors-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Floor Name') }}</th>
                                <th>{{ __('message.Description') }}</th>
                                <th>{{ __('message.Branch') }}</th>
                                <th>{{ __('message.Menu') }}</th>
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>
                    @if(count($floors) > 0)
                        <tbody>
                            @foreach($floors as $floor)
                            <tr>
                                <td>{{$floor->name}}</td>
                                <td>{{$floor->description}}</td>
                                <td>{{$floor->branch->name}}</td>
                                <td>{{$floor->menu->name}}</td>
                                <td class="text-right">
                                    <a href="{{route('floor.edit',$floor->id)}}" 
                                        class="btn btn-success btn-sm edit">{{ __('message.edit') }}</a>
                                    <form action="{{route('floor.destroy' ,$floor->id)}}" 
                                                method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('message.delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <div class="text-info text-justify text-center">
                            <p>Ther's No Data To Show</p>
                        </div>
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
        $('#floors-table').DataTable({
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