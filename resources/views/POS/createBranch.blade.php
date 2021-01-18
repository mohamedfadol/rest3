@extends('layouts.app')

        @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Branch</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                            <h4>Create New Branch</h4>
                            <table>
                                <tr>
                            {!! Form::open(['action' => 'branchViewController@store' , 'method' => 'POST']) !!}
                            @csrf
                            <div class="form-group">
                                 {{ Form::label('title' , 'Branch Title') }}
                                 {{ Form::text('branch_name' , '',['class' => 'form-control' , 'placeholder' => 'Branch Title']) }}
                             @if ($errors->has('branch_name'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('branch_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'Branch Password') }}
                                 {{ Form::text('pass' , '',['class' => 'form-control' , 'placeholder' => 'Branch Password']) }}
                                @if ($errors->has('pass'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('pass') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'repRight1') }}
                                 {{ Form::text('repRight1' , '',['class' => 'form-control' , 'placeholder' => 'repRight1']) }}
                                @if ($errors->has('repRight1'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('repRight1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'repRight2') }}
                                 {{ Form::text('repRight2' , '',['class' => 'form-control' , 'placeholder' => 'repRight2']) }}
                                @if ($errors->has('repRight2'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('repRight2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'repRight3') }}
                                 {{ Form::text('repRight3' , '',['class' => 'form-control' , 'placeholder' => 'repRight3']) }}
                                @if ($errors->has('repRight3'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('repRight3') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'repRight4') }}
                                 {{ Form::text('repRight4' , '',['class' => 'form-control' , 'placeholder' => 'repRight4']) }}
                                @if ($errors->has('repRight4'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('repRight4') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'repRight5') }}
                                 {{ Form::text('repRight5' , '',['class' => 'form-control' , 'placeholder' => 'repRight5']) }}
                                 @if ($errors->has('repRight5'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('repRight5') }}</strong>
                                    </span>
                                @endif
                            </div>
                             {{ Form::submit('Add Branch' ,['class' => 'btn btn-primary ']) }}
                        

                             {!! Form::close() !!}
                                </tr>


           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
    @endsection