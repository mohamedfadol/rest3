@extends('theme.default')

@section('heading')
Payment Type
@endsection

@section('head')
<style>
    .table thead tr th {
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{ route('payment.create') }}"><i class="material-icons">add</i> Add New Payment</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">power</i>
                </div>
                <h4 class="card-title">Payment</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="payment-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Arabic Name</th>
                                <th>English Name</th> 
                                <th>Value</th>
                                <th>Type</th> 
                                <th>Default</th>
                                <th>Note</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>

                        @if($payments)
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{$payment->name}}</td>
                                <td>{{$payment->nameEn}}</td>
                                <td>{{$payment->value}}</td>
                                <td>{{$payment->type}}</td>
                                <td>{{$payment->default}}</td>
                                <td>{{$payment->note}}</td>
                                <td class="text-right">
                                    <a 
                                        href="{{route('payment.edit',$payment->id)}}" 
                                            class
                                            ="btn btn-link btn-info btn-just-icon edit">
                                            <i class="material-icons">edit</i></a>
                                    <a 
                                        href="{{route('payment.destroy',$payment->id)}}" 
                                            class
                                            ="btn btn-link btn-danger btn-just-icon remove">
                                            <i class="material-icons">delete</i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#payment-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
      });
    });
</script>

@endsection