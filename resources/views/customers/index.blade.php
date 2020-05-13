@extends('theme.default')

@section('heading')
Customers
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
        <a class="btn btn-primary" href="{{ route('customer.create') }}"><i class="material-icons">add</i> Add New Customer</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title">Customers</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="customers-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Area</th>
                                <th>Street</th>
                                <th>CreditCard</th>
                                <th>Note</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th class="disabled-sorting text-right">Actions</th>
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
                                <td>{{$customer->note}}</td>
                                <td>{{$customer->created_at->diffForHumans()}}</td>
                                <td>{{$customer->updated_at->diffForHumans()}}</td>
                                <td class="text-right">
                                    <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i></a>
                                    <a href="{{route('customer.destroy',$customer->id)}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
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