@extends('theme.default')

@section('heading')
{{ __('message.Tables') }}
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
        <a class="btn btn-primary" href="{{ route('table.create') }}"><i class="material-icons">add</i>
         {{ __('message.Add New Table') }}</a> 
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title">{{ __('message.Tables') }}</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="tables-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Table Name') }}</th>
                                <th>{{ __('message.Number') }}</th>
                                <th>{{ __('message.Chairs Number') }}</th>
                                <th>{{ __('message.Max Chairs Number') }}</th>
                                <th>{{ __('message.Status') }}</th>
                                <th>{{ __('message.Branch') }}</th>
                                <th>{{ __('message.Floor') }}</th>
                                <th>{{ __('message.Hoster') }}</th>
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>
                    @if(count($tables) > 0)
                        <tbody>
                            @foreach($tables as $table)
                            <tr>
                                <td>{{$table->name}}</td>
                                <td>{{$table->number}}</td>
                                <td>{{$table->chairsNumber}}</td>
                                <td>{{$table->maxChairsNumber}}</td>
                                <td>{{$table->status}}</td>
                                <td>{{$table->branch->name}}</td>
                                <td>{{$table->floor->name}}</td>
                                <td>{{$table->user->name}}</td>
                                <td class="text-right">
                                    <a href="{{route('table.edit',$table->id)}}" class="btn btn-success edit">{{ __('message.edit') }}</a>
                                    <form action="{{route('table.destroy' ,$table->id)}}" 
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
        $('#tables-table').DataTable({
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