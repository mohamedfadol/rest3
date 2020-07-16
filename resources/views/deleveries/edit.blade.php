@extends('theme.default')

@section('heading')
{{ __('message.Edit An Delevery') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">{{ __('message.Edit An Delevery') }}</h4>
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
                <form id="delivery-form" method="POST" action="{{ route('delevery.update',$delevery->id ) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">

                            <label class="bmd-label-floating" for="image">{{ __('message.Icon') }}</label>
                            <input  class="form-control" name="image" type="file" id="image" required>
                            <img id="blah" src="#" alt="..." class="img-thumbnail">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.Delivery Name') }}</label>
                            <input id="name" type="text" value="{{$delevery->name}}" class="form-control" name="name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="phone">{{ __('message.Phone') }}</label>
                            <input type="text" value="{{$delevery->phone}}" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="motortype">{{ __('message.Motor Type') }}</label>
                            <input type="text" value="{{$delevery->motortype}}" class="form-control" id="motortype" name="motortype" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="number">{{ __('message.Card Number') }}</label>
                            <input type="number" value="{{$delevery->number}}" class="form-control" id="number" name="number" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="Branches">{{ __('message.Branches') }}</label>
                            <select id="Branches" class="custom-select" 
                                        name="branch_id" data-style="select-with-transition" 
                                            title="Select Branches" data-size="7" required>
                                @if($branches->isEmpty())
                                @else
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-fill btn-rose" form="delivery-form">
                {{ __('message.Submit') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    /* function for perview image*/
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#image").change(function(){
        readURL(this);
    });
    /* function for perview image*/

</script>

@endsection