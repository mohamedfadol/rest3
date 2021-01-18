@extends('layouts.app')

        @section('content')

            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-home"></i>
											</div>
											<div class="breadcomb-ctn">
                                                @auth
												<h2>Add Branch</h2>
												<p>Welcome {{ Auth::user()->name }}  to <span class="bread-ntd">Admin</span></p>
                                                @endauth
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single pro tab start-->
        <div class="single-product-tab-area mg-b-30">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
<div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="review-tab-pro-inner">
    <ul id="myTab3" class="tab-review-design">
     <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Add Branch</a></li>
    <li>
        <a href="#reviews"><i class="icon nalika-picture" aria-hidden="true"></i> Pictures</a>
    </li>
    <li>
        <a href="#INFORMATION"><i class="icon nalika-chat" aria-hidden="true"></i> Review</a>
    </li>
    </ul>
                  <div id="myTabContent" class="tab-content custom-product-edit">
            <div class="product-tab-list tab-pane fade active in" id="description">
                {!! Form::open(['action' => 'branchViewController@store' , 'method' => 'POST']) !!}
                @csrf
                <div class="form-group">
                {{ Form::label('title' , 'Branch Title') }}
                 {{ Form::label('text' , '',['class' => 'form-control' , 'placeholder' => 'title']) }}
                </div>
                 {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> 
</div>    
  @endsection
    