@extends('theme.default')

@section('head')
    <style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
    
    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }

    .dropdown.bootstrap-select.show-tick {
        width: 100% !important
    }

    .dropdown-menu.show {
        min-width: inherit !important
    }

    .filter-option {
        color: white
    }
    </style>
@endsection

@section('heading')

{{ __('message.Add a Permission') }}
@endsection

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h3><i class='fa fa-key'></i> {{ __('message.Add a Permission') }}</h3>
    <br>

    {{ Form::open(array('route' => 'permissions.store')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div><br>
    @if(!$roles->isEmpty()) 
        <h4>Assign Permission to Roles</h4>

        @foreach ($roles as $role) 
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    @endif
    <br>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection