@extends('theme.default')

@section('heading')
{{ __('message.Orders List') }}
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
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant_menu</i>
                </div>
                <h4 class="card-title">{{ __('message.Orders List') }}</h4>
            </div>

            <div class="card-body ">
                <div class="material-datatables">
                    <table id="orders-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Employee Name') }}</th>
                                <th>{{ __('message.Order Number') }}</th>
                                <th>{{ __('message.Daily Number') }}</th>
                                <th>{{ __('message.Date') }}</th>
                                <th>{{ __('message.Bill Date') }}</th>
                                <th>{{ __('message.Delivary Date') }}</th>
                                <th>{{ __('message.Bill Satate') }}</th>
                                <th>{{ __('message.Total') }}</th>
                            </tr>
                        </thead>
                        @if(count($employees) > 0 )
                            <tbody>
                                    @foreach($employees as $employee)
                                        @foreach($employee->orders as $order)
                                <tr>
                                            <td>{{ $employee->firstName}}</td>
                                            <td>{{ $order->number}}</td>
                                            <td>{{ $order->dailyNumber}}</td>
                                            <td>{{ $order->date}}</td>
                                            <td>{{ $order->billDate}}</td>
                                            <td>{{ $order->delivaryDate}}</td>
                                            <td>{{ $order->billSatate}}</td>
                                            <td>{{ $order->total}}</td>
                                        @endforeach
                                </tr>
                                    @endforeach
                            </tbody>
                            @else
                            <div class="alert alert-info text-center">There Is No Orders To Show</div>
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
        $('#orders-table').DataTable({
            dom: 'Bfrtip',
            buttons: ['print'],
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
