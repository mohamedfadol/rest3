@extends('theme.default')


@section('heading')
{{ __('message.Add New Class Products') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">kitchen</i>
                </div>
                <h4 class="card-title">{{ __('message.Add New Class Products') }}</h4>
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
                <form method="POST" action="{{ route('class.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameAr">{{ __('message.Class Product Arabic Name') }}</label>
                            <input type="text" name="nameAr" class="form-control" id="nameAr" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn">{{ __('message.Class Product English Name') }}</label>
                            <input type="text" name="nameEn" class="form-control" id="nameEn" required>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note">{{ __('message.Note') }}</label>
                            <input type="text" name="note" class="form-control" id="note" required>
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
