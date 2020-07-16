@extends('theme.default')

@section('heading')
{{ __('message.Add New Payment') }} 
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">power</i>
                </div>
                <h4 class="card-title">{{ __('message.Add New Payment') }} </h4>
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
                <form method="POST" action="{{ route('payment.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.Payment Arabic Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn">{{ __('message.Payment English Name') }}</label>
                            <input type="text" class="form-control" id="nameEn" name="nameEn">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note">{{ __('message.Note') }}</label>
                            <input type="text" class="form-control" id="note" name="note">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check mt-4">
                            <label class="form-check-label" for="value">{{ __('message.Payment Value') }}</label>
                                <input type="checkbox" 
                                            class="" 
                                                value="1"  
                                                    id="value" 
                                                        name="value">
                            <label class="form-check-label" for="type">{{ __('message.Payment Type') }}</label>
                                <input type="checkbox" 
                                            class="" 
                                                value="1" 
                                                    id="type" 
                                                        name="type">
                            <label class="form-check-label" for="default">{{ __('message.Payment Default') }}</label>
                                <input type="checkbox" 
                                            class="" 
                                                value="1" 
                                                    id="default" 
                                                        name="default">

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

@section('script')


@stop