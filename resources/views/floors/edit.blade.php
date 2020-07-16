@extends('theme.default')


@section('heading')
{{ __('message.Update Floor') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title">{{ __('message.Update Floor') }}</h4>
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
                <form method="POST" action="{{ route('floor.update' , $floor->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.Floor Name') }}</label>
                            <input 
                                type="text" 
                                    class="form-control" 
                                        id="name" 
                                            name="name" value="{{$floor->name}}" required/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="description">{{ __('message.Description') }}</label>
                            <textarea class="form-control" 
                                            id="description" 
                                                name="description">{{$floor->description}}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="branch">{{ __('message.Branch') }}</label>
                            <select id="modifires" class="custom-select" name="branch_id" 
                            data-style="select-with-transition" title="Choose ...Branche" data-size="7">
                                @if(isset($branches))
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach    
                                @endif
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="menu">{{ __('message.Menu') }}</label>
                            <select id="modifires" class="custom-select" name="menu_id" 
                            data-style="select-with-transition" title="Choose ...Menus" data-size="7">
                                @if(isset($menus))
                                    @foreach($menus as $menu)
                                        <option value="{{$menu->id}}">{{$menu->name}}</option>
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
