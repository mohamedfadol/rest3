@extends('layouts.app')

        @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Branch
                                    <small>
                                        <a class="btn btn-secondary btn-sm" 
                                            href="{{route('branch.create')}}" >
                                                Add Branch
                                        </a> 
                                    </small>
                                </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                            <h4>Update Branch</h4>
                            <table>
                                <tr>
                            {!! Form::open(['action' => ['branchViewController@update', $branch->branch_id] , 'method' => 'POST']) !!}
                                    @csrf                              
                                <div class="form-group">
                                 {{ Form::label('title' , 'Branch Title') }}
                                 {{ Form::text('branch_name' , $branch->branch_name ,['class' => 'form-control' ]) }}
                                @if ($errors->has('branch_name'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('branch_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'Branch Password') }}
                                 {{ Form::text('pass' , $branch->pass ,['class' => 'form-control']) }}
                                @if ($errors->has('pass'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('pass') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'repRight1') }}
                                 {{ Form::text('repRight1' , $branch->repRight1 ,['class' => 'form-control']) }}
                                @if ($errors->has('repRight1'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('repRight1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'repRight2') }}
                                 {{ Form::text('repRight2' , $branch->repRight2 ,['class' => 'form-control']) }}
                                @if ($errors->has('repRight2'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('repRight2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'repRight3') }}
                                 {{ Form::text('repRight3' , $branch->repRight3 ,['class' => 'form-control']) }}
                                @if ($errors->has('repRight3'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('repRight3') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'repRight4') }}
                                 {{ Form::text('repRight4' , $branch->repRight4 ,['class' => 'form-control']) }}
                                @if ($errors->has('repRight4'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('repRight4') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 {{ Form::label('title' , 'repRight5') }}
                                 {{ Form::text('repRight5' , $branch->repRight5 ,['class' => 'form-control']) }}
                                @if ($errors->has('repRight5'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('repRight5') }}</strong>
                                    </span>
                                @endif
                            </div>
                             {{ Form::submit('Update Branch' ,['class' => 'btn btn-success ']) }}

                                {{-- {{Form::hidden('_method' ,'PUT')}} --}}
                             {!! Form::close() !!}
                                </tr>


           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection