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
{{ __('message.Update a Table') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title">{{ __('message.Update a Table') }}</h4>
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
                <form method="POST" action="{{ route('table.update' , $table->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.Table Name') }}</label>
                            <input 
                                type="text" 
                                    class="form-control" 
                                        id="name" 
                                            name="name" value="{{$table->name}}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="number">{{ __('message.Number') }}</label>
                            <input class="form-control" 
                                            id="number" 
                                                type="number"
                                                name="number" 
                                                    value="{{$table->number}}" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="chairsNumber">{{ __('message.Chairs Number') }}</label>
                            <input class="form-control" 
                                            id="chairsNumber" 
                                            type="number"
                                                name="chairsNumber" 
                                                    value="{{$table->chairsNumber}}" 
                                                        required />
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="maxChairsNumber">{{ __('message.Max Chairs Number') }}</label>
                            <input class="form-control" 
                                        type="number"
                                            id="maxChairsNumber" 
                                                name="maxChairsNumber" 
                                                    value="{{$table->maxChairsNumber}}" 
                                                        required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="status">{{ __('message.Status') }}</label>
                            <input class="form-control" 
                                            id="status" 
                                                type="number"
                                                name="status" 
                                                    value="{{$table->status}}"  
                                                        required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="branch">{{ __('message.Branch') }}</label>
                            <select id="modifires" class="custom-select" 
                                name="branch_id" data-style="select-with-transition" title="Branch Name" data-size="7" required>
                                @if(isset($branches))
                                <option value="">Choose ...</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach    
                                @endif
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="floor">{{ __('message.Floor') }}</label>
                            <select id="floor_id" class="custom-select" 
                                name="floor_id" data-style="select-with-transition" title="Floor Name" data-size="7" required>
                                @if(isset($floors))
                                <option value="">Choose ...</option>
                                    @foreach($floors as $floor)
                                        <option value="{{$floor->id}}">{{$floor->name}}</option>
                                    @endforeach  
                                @endif
                            </select>
                        </div>
                    </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-fill btn-rose">{{ __('message.Submit') }}</button>
                            </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
