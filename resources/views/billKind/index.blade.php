@extends('theme.default')

@section('heading')
{{ __('message.BillKinds') }}
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
        <a class="btn btn-primary" href="{{ route('billKind.create') }}"><i class="material-icons">add</i> {{ __('message.Add New BillKind') }}</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">bill_kind</i>
                </div>
                <h4 class="card-title">{{ __('message.BillKinds') }}</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="billkinds-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.BillKind Number') }}</th>
                                <th>{{ __('message.BillKind Name') }}</th>
                                <th>{{ __('message.BillKind Name English') }}</th>
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>

                    @if(count($billKinds) > 0 ) 
                        <tbody>
                        @foreach($billKinds as $billKind)
                        <tr>
                            <td>{{ $billKind->BillKindNumber }}</td>
                            <td>{{ $billKind->BillKindName }}</td>
                            <td>{{ $billKind->BillKindNameEnglish }}</td>
                            <td class="text-right">
                                <a href="{{route('billKind.edit' ,$billKind->id)}}" 
                                    class="btn btn-success btn-sm edit">
                                    {{ __('message.edit') }}</a>
                                    <form action="{{route('billKind.destroy' ,$billKind->id)}}" 
                                                method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('message.delete') }}</button>
                                    </form>
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
        $('#billkinds-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [5, 10, 50, "All"]
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