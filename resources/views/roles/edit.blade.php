@extends('theme.default')

@section('heading')
{{ __('message.Edit Role') }}
@endsection
  
@section('content')

<div class='col-lg-4 col-lg-offset-4'>
    <h3><i class='fa fa-key'></i> {{ __('message.Edit Role') }}: {{$role->name}}</h3>
    <hr>

    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Role Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>{{ __('message.Assign Permissions') }}</b></h5>
    @foreach ($permissions as $permission)

        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

    @endforeach
    <br>
    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}    
</div>

@endsection