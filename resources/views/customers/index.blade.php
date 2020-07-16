@extends('theme.default')

@section('heading')
{{ __('message.Customers') }}
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
        <a class="btn btn-primary" href="{{ route('customer.create') }}"><i class="material-icons">add</i> 
        {{ __('message.Add New Customer') }}</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title">{{ __('message.Customers') }}</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="customers-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Customer Name') }}</th>
                                <th>{{ __('message.Nationality') }}</th>
                                <th>{{ __('message.E-mail') }}</th>
                                <th>{{ __('message.Phone') }}</th>
                                <th>{{ __('message.Country') }}</th>
                                <th>{{ __('message.State') }}</th>
                                <th>{{ __('message.City') }}</th>
                                <th>{{ __('message.Area') }}</th>
                                <th>{{ __('message.Street') }}</th>
                                <th>{{ __('message.CreditCard') }}</th>
                                <th>{{ __('message.Discount') }}</th>
                                <th>{{ __('message.Note') }}</th>
                                <th>{{ __('message.Created At') }}</th>
                                <th>{{ __('message.Updated At') }}</th>
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>
                    @if(count($customers) > 0)
                        <tbody>
                            @foreach($customers as $customer) 
                            <tr>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->nationality}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->country}}</td>
                                <td>{{$customer->state}}</td>
                                <td>{{$customer->city}}</td>
                                <td>{{$customer->area}}</td>
                                <td>{{$customer->street}}</td>
                                <td>{{$customer->creditCard}}</td>
                                <td>{{$customer->discount}}</td>
                                <td>{{$customer->note}}</td>
                                <td>{{$customer->created_at->diffForHumans()}}</td>
                                <td>{{$customer->updated_at->diffForHumans()}}</td>
                                <td class="text-right">
                                    <a href="{{route('customer.edit',$customer->id)}}" 
                                        class="btn btn-success btn-sm edit">{{ __('message.edit') }}</a>
                                    <form action="{{route('customer.destroy' ,$customer->id)}}" 
                                                method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('message.delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <div class="text-info text-justify text-center">
                            <p>Ther's No Data To Show</p>
                        </div>
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
        $('#customers-table').DataTable({
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