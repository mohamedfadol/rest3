@extends('theme.default')

    @section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                        <div class="x_title">
                            <h2>تقرير المبيعات حسب الفرع</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                    <form id="demo-form2" action="{{route('showReportsSales')}}" method="post" 
                        data-parsley-validate class="form-horizontal  form-label-left">
                        @csrf
                        <div class="item form-group">
                                <label class="col-form-label 
                                        col-md-3 col-sm-3 label-align" 
                                            for="datenew">
                                                من تاريخ  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" 
                                        name="datenew" 
                                            required class="form-control"
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
                                            for="endtime">
                                                الى تاريخ  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" 
                                        name="endtime" 
                                            required class="form-control"
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

                    @if(isset($branches))
                    @php($totalsum = 0) 
                    @php($totsum = 0)
                <div class="row">
                <div class="table-responsive">
                    <table id="example" class="table table-striped jambo_table bulk_action display"  style="width:100%">
                        <thead>
                              <tr class="text-center">
                                        <th>الفرع</th>
                                        <th>المجموع</th>
                                        <th>تجميعي</th>
                              </tr>
                        </thead>
                        <tbody>
                            @foreach($branches as $branch)
                                <tr  class="text-center">
                                    <td>{{$branch->branch_name}}</td>
                                    <td>{{$totalsum = $branch->ordersSum($startDate,$endDate)}}</td>
                                    <td>{{$totsum += $branch->ordersSum($startDate,$endDate)}}</td>
                                </tr>
                            @endforeach
                            <tr class="text-center">
                                <td> الاجمالي </td>
                                <td>  </td>
                                <td>{{ $totsum }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                </div>                        
              </div>
            </div>
        </div>
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
            'pdfHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
