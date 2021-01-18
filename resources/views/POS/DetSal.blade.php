@extends('layouts.app')

    @section('content')
   <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                            <div class="x_title">
                                <h2> تقرير تفاصيل المواد    </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                @include('layouts.messages')
                            <form id="demo-form2" action="{{route('showDelSal')}}" method="POST" 
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
         @if(isset($branches))
         @php($totalSums = 0)
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x-editable-list">
                        <table id="example" class="table table-striped jambo_table bulk_action display"  style="width:100%">
                            <tbody>
                                <tr class="text-center">
                                    <th>Branch Name</th>
                                    <th>Total sales</th>
                                    <th>In</th>
                                    <th>Out</th>
                                    <th>Present</th>
                                    <th>Delivery Send</th>
                                    <th>Delivery Comes</th>
                                    <th>Car</th> 
                                </tr>
                                    @foreach($branches as $branch)
                                    @php($sumsArray = $branch->ordersSumByType($startDate, $endDate))
                                        <tr  class="text-center">
                                            <td>{{$branch->branch_name}}</td>
                                            <td>{{$totalSums += $branch->ordersSum($startDate, $endDate)}}</td>
                                            <td>{{ $sumsArray['in'] }}</td>
                                            <td>{{ $sumsArray['out'] }}</td>
                                            <td>{{ $sumsArray['present'] }}</td>
                                            <td>{{ $sumsArray['delivery-send'] }}</td>
                                            <td>{{ $sumsArray['delivery-comes'] }}</td>
                                            <td>{{ $sumsArray['car'] }}</td>

                                        </tr>
                                    @endforeach
                                    <tr class="text-center">
                                        <td>Total : {{ $totalSums }}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
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