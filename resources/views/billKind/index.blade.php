@extends('theme.default')

@section('heading')
BillKinds
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
        <a class="btn btn-primary" href="{{ route('billKind.create') }}"><i class="material-icons">add</i> Add New BillKind</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">bill_kind</i>
                </div>
                <h4 class="card-title">BillKinds</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="billkinds-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>BillKind Number</th>
                                <th>BillKind Name</th>
                                <th>BillKind Name English</th>
                                <th class="disabled-sorting text-right">Actions</th>
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
                                <a href="{{route('billKind.edit' ,$billKind->id)}}" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i></a>
                                <a href="{{route('billKind.destroy' ,$billKind->id)}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
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