@extends('theme.default')

@section('heading') 
Add a Employee
@endsection

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Add Employee</h1>
    
        @if (count($errors) > 0)
            <div class="alert alert-danger py-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{route('employees.create')}}" method="POST" accept-charset="utf-8">
        @csrf
    <div class="form-group">   
        <input type="text" 
                    name="firstName" 
                        value="{{old('firstName')}}" 
                            placeholder="Enter First Name For User" 
                                class="form-control">
    </div>

    <div class="form-group">
        <input type="text" 
            name="LastName" 
                value="{{old('LastName')}}" 
                    placeholder="Enter Last Name For User" 
                        class="form-control">
    </div>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>  
 
    <div class="form-group">
        <input type="number" 
                    name="binCode" 
                        value="{{old('binCode')}}" 
                            placeholder=" Enter BinCode For User" 
                                class="form-control">
    </div>

    <div class="form-group">
        <label class="bmd-label-floating" for="branch">Branch</label>
        <select id="Branch" class="custom-select" name="branch_id" data-style="select-with-transition" title="Branch" data-size="7">
            @if(isset($branches))
            <option value="">Choose ... Branch</option>
                @foreach($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                @endforeach    
            @endif
        </select>
    </div>

    <div class="form-group">
        <label class="bmd-label-floating" for="floor">Floor</label>
        <select id="floor" class="custom-select" name="floor_id" data-style="select-with-transition" title="Floor" data-size="7">
            @if(isset($floors))
            <option value="">Choose ...Floor</option>
                @foreach($floors as $floor)
                    <option value="{{$floor->id}}">{{$floor->name}}</option>
                @endforeach    
            @endif
        </select>
    </div>

    <input type="submit"  value="Add Employee" class="tn btn-primary">

    </form>
</div>

@endsection