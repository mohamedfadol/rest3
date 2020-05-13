@extends('theme.default')

@section('heading')
Gift Cards
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
        <a class="btn btn-primary" href="{{ route('giftcard.create') }}"><i class="material-icons">add</i> Add New Gift Card</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">card_giftcard</i>
                </div>
                <h4 class="card-title">Gift Cards</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="giftcards-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Valid From</th>
                                <th>Valid To</th>
                                <th>Number of Coupons</th>
                                <th>Valid On</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>

                    @if(count($giftcards) > 0 )
                        <tbody>
                        @foreach($giftcards as $giftcard)
                        <tr>
                            <td>{{ $giftcard->name }}</td>
                            <td>{{ $giftcard->type }}</td>
                            <td>{{ $giftcard->amount }}</td>
                            <td>{{ $giftcard->ValidFrom }}</td>
                            <td>{{ $giftcard->validTo }}</td>
                            <td>{{ $giftcard->couponNumber }}</td>
                            <td>{{ $giftcard->validOn }}</td>
                            <td class="text-right">
                                <a href="{{route('giftcard.edit' ,$giftcard->id)}}" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i></a>
                                <a href="{{route('giftcard.destroy' ,$giftcard->id)}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
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
        $('#giftcards-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
            searchPlaceholder: "Search",
        }
      });
    });
</script>

@endsection