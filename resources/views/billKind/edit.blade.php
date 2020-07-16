@extends('theme.default')

@section('heading')
{{ __('message.Edit BillKind') }}
@endsection

@section('content') 
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">bill_kind</i>
                </div>
                <h4 class="card-title">{{ __('message.Edit BillKind') }}</h4>
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
                <form method="POST" action="{{ route('billKind.update',$billKind->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="BillKindNumber">
                            {{ __('message.BillKind Number') }}</label>
                            <input type="number" name="BillKindNumber" class="form-control" id="BillKindNumber" value="{{$billKind->BillKindNumber}}" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="BillKindName">
                            {{ __('message.BillKind Name') }}</label>
                            <input type="text" name="BillKindName" class="form-control" id="BillKindName" value="{{$billKind->BillKindName}}" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="BillKindNameEnglish">
                            {{ __('message.BillKind Name English') }}</label>
                            <input type="text" name="BillKindNameEnglish" class="form-control" id="BillKindNameEnglish" value="{{$billKind->BillKindNameEnglish}}">
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
