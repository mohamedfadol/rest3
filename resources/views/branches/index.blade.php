@extends('theme.default')

@section('heading')
{{ __('message.Branches') }}
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
        <a class="btn btn-primary" href="{{ route('branch.create') }}">
            <i class="material-icons">add</i> {{ __('message.Add New Branch') }}
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant</i>
                </div>
                <h4 class="card-title">{{ __('message.Branches') }}</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="branches-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Name') }}</th>
                                <th>{{ __('message.Location') }}</th>
                                <th>{{ __('message.Phone') }}</th>
                                <th>{{ __('message.Delivery Price') }}</th>
                                <th>{{ __('message.Tax') }}</th>
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
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
                                    <a href="{{route('branch.edit' , $branch->id)}}" 
                                        class="btn btn-success btn-sm  edit">
                                            {{ __('message.edit') }} 
                                    </a>
                                    <form action="{{route('branch.destroy' ,$branch->id)}}" 
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