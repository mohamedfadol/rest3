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
                            <div class="table-responsive">    
                            <table class="table table-striped jambo_table bulk_action">
                                <tr class="headings">
                                    <th>Branch ID</th>
                                    <th>Branch Title</th>
                                    <th>Report 1</th>
                                    <th>Report 2</th>
                                    <th>Report 3</th>
                                    <th>Report 4</th>
                                    <th>Report 5</th>
                                    <th>Setting</th>
                                </tr>
   

                                @if(count($branch) > 0 )
                                        @foreach ($branch as $bransh ) 
                                <tr  class="even pointer">
                                            <td>{{$bransh->branch_id}}</td>
                                            <td>{{$bransh->branch_name}}</td>
                                            <td>{{$bransh->repRight1}}</td>
                                            <td>{{$bransh->repRight2}}</td>
                                            <td>{{$bransh->repRight3}}</td>
                                            <td>{{$bransh->repRight4}}</td>
                                            <td>{{$bransh->repRight5}}</td>
                                            <td>

                                            <a href="{{route('branchEdit',$bransh->branch_id)}}"> 
                                                <button class="btn btn-primary btn-sm">Edit
                                                </button>
                                            </a> 

                                            <a href="{{route('destroy',$bransh->branch_id)}}">    
                                                <button class="btn btn-danger btn-sm">
                                            {!! Form::open(['action' => ['branchViewController@destroy', $bransh->branch_id] , 'method' => 'POST']) !!} 
                                                   @csrf                              
                                                {{Form::hidden('_method' ,'DELETE')}}                        
                                            {!! Form::close() !!}
                                                Delete
                                                </button>
                                            </a>      
                                            </td>

                                        @endforeach
                                    @else
                                    <p class="alert alert-info"> Ther's No Data</p>
                                </tr>
                                @endif    
                            </table>
                            </div>
                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item">  
                                    {{$branch->onEachSide(1)->links()}}
                                    </li>
 								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
    @endsection