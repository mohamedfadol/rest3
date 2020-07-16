@extends('theme.default')


@section('heading')
{{ __('message.Roles') }}
@endsection

@section('content')

<div class="col-lg-12 col-lg-offset-1">
    <h3><i class="fa fa-key"></i> {{ __('message.Roles') }}

    <a href="{{ route('employees.index') }}" class="btn btn-default pull-right">{{ __('message.Employee') }}</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">{{ __('message.Permissions') }}</a></h3>
    <hr>
    <div class="material-datatables">
        <table id="roles-table" class="table table-bordered table-hover" cellspacing="0"  style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('message.Roles') }}</th>
                    <th>{{ __('message.Permissions') }}</th>
                    <th>{{ __('message.Actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>
                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left btn-sm">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm pull-right']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ URL::to('roles/create') }}" class="btn btn-success">{{ __('message.Submit') }}</a>

</div>

@endsection


@section('script')
<script>
    $(document).ready(function() {
        $('#roles-table').DataTable({
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