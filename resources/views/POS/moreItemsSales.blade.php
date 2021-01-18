@extends('theme.default')

    @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                            <div class="x_title">
                                <h2> تقرير المواد الأكثر بيع  </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                @include('layouts.messages')
                            <form id="demo-form2" action="{{route('showsellingMoreItems')}}" method="POST" 
                            data-parsley-validate class="form-horizontal  form-label-left">
                            @csrf
                            <div class="item form-group">
                                    <label class="col-form-label 
                                            col-md-3 col-sm-3 label-align" 
                                                for="first-name">
                                                    من تاريخ  <span>*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" 
                                            name="datenew" 
                                                 class="form-control"
                                                    value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                >
                                        @if ($errors->has('datenew'))
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $errors->first('datenew') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                                                        <div class="item form-group">
                                    <label class="col-form-label 
                                            col-md-3 col-sm-3 label-align" 
                                                for="first-name">
                                                   الى تاريخ  <span>*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" 
                                            name="endtime" 
                                                 class="form-control"
                                                    value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                >
                                        @if ($errors->has('endtime'))
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $errors->first('endtime') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                             
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($x))
            <div class="row">
                <div class="table-responsive">
                    <table id="example" class="table table-striped jambo_table bulk_action display"  style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>Name</th>
                                @foreach ($branches as $branch)
                                    <th>{{ $branch->branch_name }}</th>
                                @endforeach
                                <th> Total </th> 
                            </tr>
                        </thead>    
                            <tbody>
                                @foreach($materials as $material)
                                    <tr>
                                        <td>{{$material->Name1}}</td> 
                                    @foreach($branches as $branch)
                                        @if($branch->orders()->count() >= 1)
                                            <td>{{$material->Qty}}</td>
                                        @else
                                            <td>0</td>
                                        @endif
                                    @endforeach
                                        <td>{{$materials->count()}}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>    
    </div>  
@endsection
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'excel',
            'pdf',
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>  
