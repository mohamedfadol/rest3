@extends('theme.adminDefaulte')

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
                                <th>Branch Name</th>
                                <th>Owner Name</th>
                                <th>Employees Name</th>
                                <th> Floors Count</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        @if(isset($branches))
                        <tbody>
                            @foreach($branches as $branch)

                               <td>{{ $branch->name }}</td>
                               <td>{{ $branch->owner->name}}</td>
                               <td>   @foreach($branch->employees as $employee)
                                    <span>{{ $employee->firstName }} | </span> 
                                    @endforeach
                               </td>

                               <td>{{ $branch->floors->count() }}</td>

                                <td class="text-right">
                                    <a href="{{route('admin.branch.edit' , $branch->id)}}" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i>
                                    </a>
                                    
                                    <a href="{{route('admin.branch.destroy' , $branch->id)}}" class="btn btn-link btn-danger btn-just-icon remove disabled"><i class="material-icons">delete</i></a>
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
                [10, 25,  -1],
                [10, 25,  "All"]
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