@extends('theme.default')

@section('heading')
Branches
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
        <a class="btn btn-primary" href="{{ route('branch.create') }}"><i class="material-icons">add</i> Add New Branch</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant</i>
                </div>
                <h4 class="card-title">Branches</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="branches-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Phone</th>
                                <th>Delivery Price</th>
                                <th>Tax</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        @if(isset($branches))
                        <tbody>
                            @foreach($branches as $branch)

                               <td>{{$branch->name}}</td>
                               <td>{{$branch->address_address}}</td>
                               <td>{{$branch->phone}}</td>
                               <td>{{$branch->delivery_price}}</td>
                               <td>{{$branch->tax}}</td>

                                <td class="text-right">
                                    <a href="{{route('branch.edit' , $branch->id)}}" class="btn btn-link btn-info btn-just-icon  edit"><i class="material-icons">edit</i>
                                    </a>
                                    
                                    <a href="{{route('branch.destroy' , $branch->id)}}" class="btn btn-link btn-danger btn-just-icon disabled remove"><i class="material-icons">delete</i></a>
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
        $('#branches-table').DataTable({
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