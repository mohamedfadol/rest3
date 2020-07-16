@extends('theme.default')

@section('heading')
{{ __('message.Add New Menu') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">{{ __('message.Add New Menu') }}</h4>
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
                <form method="POST" action="{{ route('menu.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.Menu Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="description">{{ __('message.Description') }}</label>
                            <textarea class="form-control"  name="description"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label mr-2" for="category_id">{{ __('message.Categories') }}</label>
                            <select id="category_id" class="selectpicker" multiple 
                                name="category_id[]" data-style="select-with-transition" title="Choose... Categories" data-size="7" required>
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
