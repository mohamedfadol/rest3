@extends('theme.default')


@section('heading')
{{ __('message.Add New Discount') }} 
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_offer</i>
                </div>
                <h4 class="card-title">{{ __('message.Add New Discount') }} </h4>
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
                <form method="Post" action="{{ route('discount.store') }}">
                      @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.Discount Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label label-checkbox">{{ __('message.Discount Type') }}</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" value="open" checked> Percent
                                        <span class="circle">
                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" value="pre"> Fixed
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="amount">{{ __('message.Discount Amount') }}</label>
                            <input type="text" class="form-control" id="amount" name="amount" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="product_id">{{ __('message.Discount Product Name') }}</label>
                            <select id="product_id" class="custom-select" name="product_id" data-style="select-with-transition" title="product_id" data-size="7">
                                @if(count($products) > 0)
                                <option value="">Choose...Product</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->nameAr}}</option>
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
