@extends('theme.default')


@section('heading')
{{ __('message.Add a Role') }}
@endsection
  
@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h3><i class='fa fa-key'></i> Add Role</h3>
    <hr>

    {{ Form::open(array('route' => 'roles.store')) }}
        @csrf
    <div class="form-group">
        {{ Form::label('name', 'Name') }} 
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Assign Permissions</b></h5> 

    <div class='form-group'>
        @foreach ($permissions as $permission)
            {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

        @endforeach
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection