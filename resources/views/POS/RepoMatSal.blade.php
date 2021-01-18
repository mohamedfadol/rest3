@extends('theme.default')

    @section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                        <div class="x_title">
                            <h2> تقاربر المبيعات  للمواد </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                    <form id="demo-form2" action="{{route('showRepSalMats')}}" method="post" 
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" 
                                        for="last-name">
                                             الفرع  
                                </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="branch" id="heard" class="form-control">
                                    <option value="">Choose One Branch..</option>
                                    @if(isset($branch))
                                        @foreach($branch as $bra)
                                            <option value="{{$bra->branch_id}}"> 
                                                {{$bra->branch_name}}
                                            </option>
                                        @endforeach
                                    @else
                                        @foreach($branch as $bra)
                                            <option value="{{$bra->branch_id}}"> 
                                                {{$bra->branch_name}}
                                            </option>
                                        @endforeach
                                    @endif 
                                </select>
                                @if ($errors->has('branch'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('branch') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" 
                                        for="last-name">
                                             المستخدم  
                                </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="users" id="heard" class="form-control">
                                    <option value="">Choose One User..</option>
                                    @if(isset($users))
                                        @foreach($users as $user)
                                            <option value="{{$user->Guid}}"> 
                                                {{$user->Name}}
                                            </option>
                                        @endforeach
                                    @else
                                        @foreach($users as $user)
                                            <option value="{{$user->Guid}}"> 
                                                {{$user->Name}}
                                            </option>
                                        @endforeach
                                    @endif 
                                </select>
                                @if ($errors->has('users'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('users') }}</strong>
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

                @if(isset($materials))  
                <div class="row">
                <div class="table-responsive">
                    <table id="example" class="table table-striped jambo_table bulk_action display"  style="width:100%">
                        <thead>
                              <tr class="headings">
                                    <th>الرمز</th>                                        
                                    <th>المادة</th>                                      
                                    <th>الكمية</th>
                                    <th>السعر</th>
                                    <th>المجموع</th>
                              </tr>
                        </thead>
                        <tbody>
                       
                            @foreach($materials as $material)
                                <tr>
                                <td>{{$material->Code}}</td>
                                <td>{{$material->Name1}}</td>
                                <td>{{number_format($material->Qty,2)}}</td>
                                <td>{{number_format($material->Price,2)}}</td>
                                <td>{{number_format($material->Qty * $material->Price,2)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="lead muted text-right m-4">المجموع: {{ number_format($materials->sum('Qty') *  $materials->sum('Price'),2)}}</div>
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
            'pdfHtml5'
        ]
    } );
} );
</script>  
