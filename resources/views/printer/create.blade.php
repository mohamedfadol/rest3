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
{{ __('message.Add New Printer') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i> 
                </div>
                <h4 class="card-title">{{ __('message.Add New Printer') }}</h4>
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
                <form method="POST" action="{{ route('printer.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.Printer Arabic Name') }}</label>
                            <input type="text" 
                                        name="name" 
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
                                                id="enName" 
                                                    
                                                    >
                        </div>
                    </div>   

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printer">{{ __('message.Printer') }}</label>
                            <input type="text" 
                                        name="printer" 
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
                                            class="form-control" 
                                                id="printerName" 
                                                    
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printerIndex">{{ __('message.Printer Index') }}</label>
                            <input type="number" 
                                        name="printerIndex" 
                                            class="form-control" 
                                                id="printerIndex" 
                                                    
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="copiesNumber">{{ __('message.Copies Number') }}</label>
                            <input type="number" 
                                        name="copiesNumber" 
                                            class="form-control" 
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note">{{ __('message.Notes') }}</label>
                            <input type="text" 
                                        name="note" 
                                            class="form-control" 
                                                id="note" >
                        </div>
                    </div> 
                    <div class="row">
                        <div class="form-group col-md-6 mt-6"> 
                            <label class="bmd-label-floating" for="branch">{{ __('message.Branch') }}</label>
                            <select id="branch" class="custom-select" name="branch_id" data-style="select-with-transition" title="Branch" data-size="7" required>
                                <option value=""> Choose ... Branch</option>
                                @if(count($branches) > 0)
                                @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
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

@section('script')

@endsection