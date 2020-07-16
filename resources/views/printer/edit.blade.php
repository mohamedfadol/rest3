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

    .dropdown.bootstrap-select.show-tick {
        width: 100% !important
    }

    .dropdown-menu.show {
        min-width: inherit !important
    }

    .filter-option {
        color: white
    }
    </style>
@endsection

@section('heading')
{{ __('message.Edit a Printer') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">{{ __('message.Edit a Printer') }}</h4>
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
                <form method="POST" action="{{ route('printer.update',$printer->id) }}">
                    @csrf
                    {{ method_field('PUT') }} 
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.Printer Arabic Name') }}</label>
                            <input type="text" 
                                        name="name" 
                                        value="{{$printer->name}}"
                                            class="form-control" 
                                                id="name" 
                                                    required
                                                    >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="enName">{{ __('message.Printer English Name') }}</label>
                            <input type="text" 
                                        class="form-control" 
                                            name="enName" 
                                            value="{{$printer->enName}}"
                                                id="enName" 
                                                    required
                                                    >
                        </div>
                    </div>   

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printer">{{ __('message.Printer') }}</label>
                            <input type="text" 
                                        name="printer"
                                        value="{{$printer->printer}}" 
                                            class="form-control" 
                                                id="printer" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printerName">{{ __('message.Printer Name') }}</label>
                            <input type="text" 
                                        name="printerName" 
                                        value="{{$printer->printerName}}"
                                            class="form-control" 
                                                id="printerName" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printerIndex">{{ __('message.Printer Index') }}</label>
                            <input type="number" 
                                        name="printerIndex" 
                                        value="{{$printer->printerIndex}}"
                                            class="form-control" 
                                                id="printerIndex" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="copiesNumber">{{ __('message.Copies Number') }}</label>
                            <input type="number" 
                                        name="copiesNumber" 
                                        value="{{$printer->copiesNumber}}"
                                            class="form-control" 
                                                id="copiesNumber" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note">{{ __('message.Notes') }}</label>
                            <input type="text" 
                                        name="note" 
                                        value="{{$printer->note}}"
                                            class="form-control" 
                                                id="note" 
                                                    required
                                                    >
                        </div>
                    </div> 
                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="branch">{{ __('message.Branch') }}</label>
                            <select id="modifires" class="custom-select" name="branch_id" data-style="select-with-transition" title="modifires" data-size="7">
                                @if(count($branches) > 0)
                                @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                                @else
                                <option value="">Ther's No Branch To Add</option>
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

@section('script')

@endsection