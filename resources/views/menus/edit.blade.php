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
    </style>
@endsection

@section('heading')
Add a Menu
@endsection
  
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">Update a Menu</h4>
            </div>
            <div class="card-body ">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger py-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form method="POST" action="{{ route('menu.update' , $menu->id)}}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">Name</label>
                            <input type="text" value="{{$menu->name}}" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="description">Description</label>
                            <textarea 
                                class="form-control" 
                                    id="description" 
                                        name="description">{{$menu->description}}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label mr-2" for="categories">Categories</label>
                            <select id="categories" class="selectpicker" multiple 
                                name="categories[]" data-style="select-with-transition" title="categories" data-size="7">
                                    <option value="0">Choose... Categories</option>
                                @if($categories->isEmpty())
                                @else
                                    @foreach($categories as $category)
                                        <option  value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                        <button type="submit" class="btn btn-fill btn-rose">Submit and new</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
