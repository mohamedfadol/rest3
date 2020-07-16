@extends('theme.default')

@section('heading')
{{ __('message.Deliveries') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{ route('delevery.create') }}">
                <i class="material-icons">add</i>{{ __('message.Add New Delivery') }} </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">Delivery</i>
                </div>
                <h4 class="card-title"><th>{{ __('message.Deliveries') }}</th></h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="deliveries-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Icon') }}</th>
                                <th>{{ __('message.delevery Name') }}</th>
                                <th>{{ __('message.Phone') }}</th>
                                <th>{{ __('message.Motor Type') }}</th>
                                <th>{{ __('message.Card Number') }}</th>
                                <th>{{ __('message.Branch') }}</th>
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($deliveries as $delivery) 
                                <tr>
                                    <td width="9%">
                                    <img class="img-thumbnail" 
                                        src="{{ URL::asset('/storage/'.$branchname.'/delevery/'.$delivery->image) }}">
                                    </td>
                                    <td>{{ $delivery->name }}</td>
                                    <td>{{ $delivery->phone }}</td>
                                    <td>{{ $delivery->motortype }}</td>
                                    <td>{{ $delivery->number}}</td>
                                    <td>{{ $delivery->branch->name }}</td>
                                    <td class="text-right">
                                        <a href="{{route('delevery.edit' ,$delivery->id)}}" 
                                                class="btn btn-success btn-sm edit">
                                            {{ __('message.edit') }}</a>
                                    <form action="{{route('delevery.destroy' ,$delivery->id)}}" 
                                                method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('message.delete') }}</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
        $('#deliveries-table').DataTable({
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