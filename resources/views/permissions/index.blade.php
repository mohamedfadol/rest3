@extends('theme.default')

@section('heading')
{{ __('message.Permissions') }}
@endsection

@section('content')

<div class="col-lg-12 col-lg-offset-1">
    <h3><i class="fa fa-key"></i>{{ __('message.Available Permissions') }}

    <a href="{{ route('employees.index') }}" class="btn btn-default pull-right">{{ __('message.Employees') }}</a>
    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">{{ __('message.Roles') }}</a></h3>
    <hr>
    <div class="material-datatables">
        <table id="permissions-table" class="table table-bordered table-hover" cellspacing="1" width="100%" style="width:100%">

            <thead>
                <tr>
                    <th>{{ __('message.Permissions') }}</th>
                    <th>{{ __('message.Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left btn-sm">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm pull-right']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">{{ __('message.Submit') }}</a>

</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#permissions-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [7, 14, 30, -1],
                [7, 14, 30, "All"]
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