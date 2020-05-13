@extends('theme.default')

@section('heading')
Employees
@endsection

@section('head')
<style>
    .table thead tr th {
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')

<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> User Administration <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
    <hr>
    <div class="material-datatables">
        <table id="users-table" class="table table-bordered table-hover" cellspacing="1" style="width:100%">

            <thead>
                <tr> 
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $user)
                <tr>

                    <td>{{ $user->firstName }}</td> 
                    <td>{{ $user->LastName }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' * ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                    <a href="{{ route('employees.edit', $user->id) }}" class="btn btn-info pull-left btn-sm" >Edit</a> 
                    {!! Form::open(['method' => 'DELETE', 'route' => ['employees.destroy', $user->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm pull-right']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('employees.create') }}" class="btn btn-success">Add User</a>

</div>

@endsection


@section('script')
<script>
    $(document).ready(function() {
        $('#users-table').DataTable({
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