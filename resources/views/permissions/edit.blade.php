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
{{ __('message.Edit a Permission') }}
@endsection

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
    <br>
    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

    <div class="form-group">
        {{ Form::label('name', 'Permission Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <br>
    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection