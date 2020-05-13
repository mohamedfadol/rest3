@extends('theme.default')

@section('heading')
Edit a Employee
@endsection

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h3><i class='fa fa-user-plus'></i> Edit {{$employee->name}}</h3>
    <hr>
    
        @if (count($errors) > 0)
            <div class="alert alert-danger py-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{route('employees.update' , $employee->id)}}" method="POST" accept-charset="utf-8">
        @csrf
        {{ method_field('PUT') }}
    <div class="form-group">   
        <input type="text" 
                    name="firstName" 
                        value="{{$employee->firstName}}" 
                            placeholder="Enter First Name For User"  
                                class="form-control">
    </div>

    <div class="form-group">
        <input type="text" 
            name="LastName" 
                value="{{$employee->LastName}}" 
                    placeholder="Enter Last Name For User" 
                        class="form-control">
    </div> 
 
    <div class="form-group">
        <input type="number" 
                    name="binCode" 
                        value="{{$employee->binCode}}" 
                            placeholder=" Enter BinCode For User" 
                                class="form-control">
    </div>

    <h5><b>Give Role</b></h5>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id, $employee->roles ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>



    <div class="form-group">
        <label class="bmd-label-floating" for="branch">Branch</label>
        <select id="Branch" class="custom-select" name="branch_id" data-style="select-with-transition" title="Branch" data-size="7">
            @if(isset($branches))
                @foreach($branches as $branch)
                @if($branch->id == $employee->branch_id)
                    <option selected value="{{$branch->id}}">{{$branch->name}}</option>
                @else 
                    <option value="">Choose ... Branch</option>
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                @endif    
                @endforeach    
            @endif
        </select>
    </div>

    <div class="form-group">
        <label class="bmd-label-floating" for="floor">Floor</label>
        <select id="floor" class="custom-select" name="floor_id" data-style="select-with-transition" title="Floor" data-size="7">
            @if(isset($floors))
                @foreach($floors as $floor)
                @if($floor->id == $employee->floor_id)
                    <option selected value="{{$floor->id}}">{{$floor->name}}</option>
                @else 
                    <option value="">Choose ... Floor</option>
                    <option value="{{$floor->id}}">{{$floor->name}}</option>
                @endif  
                @endforeach    
            @endif
        </select>
    </div>

    <input type="submit"  value="Udate Employee" class="tn btn-primary">

    </form>

</div>

@endsection