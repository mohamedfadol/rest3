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
Add a Company
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Add a Company</h4>
            </div>
            <div class="card-body ">
                <form method="#" action="#">

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">Company Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="commercial_register">Commercial Register</label>
                            <input type="text" class="form-control" id="commercial_register">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="logo">Logo</label>
                            <input type="file" class="form-control" id="logo">
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                <button type="submit" class="btn btn-fill btn-rose">Submit and new</button>
            </div>
        </div>
    </div>
</div>
@endsection
