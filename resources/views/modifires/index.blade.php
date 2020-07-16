@extends('theme.default')

@section('heading')
{{ __('message.modifires') }}
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
        <a class="btn btn-primary" href="{{ route('modifire.create') }}">
            <i class="material-icons">add</i> {{ __('message.Add New modifire') }}</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">power</i>
                </div>
                <h4 class="card-title">{{ __('message.modifires') }}</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="modifires-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.modifire Arabic Name') }}</th>
                                <th>{{ __('message.modifire English Name') }}</th>
                                <th>{{ __('message.SKU') }}</th>
                                <th>{{ __('message.Cost') }}</th>
                                <th>{{ __('message.Tax') }}</th>
                                <th>{{ __('message.Price') }}</th>
                                <th>{{ __('message.Unit') }}</th>
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>
                        @if(count($modifires) > 0)
                        <tbody>
                            @foreach($modifires as $modifire)
                            <tr>
                                <td>{{$modifire->nameAr}}</td>
                                <td>{{$modifire->nameEn}}</td>
                                <td>{{$modifire->sku}}</td>
                                <td>{{$modifire->cost}}</td>
                                <td>{{$modifire->tax}}</td>
                                <td>{{$modifire->price}}</td>
                                <td>{{$modifire->unit}}</td>
                                <td class="text-right">
                                    <a 
                                        href="{{route('modifire.edit',$modifire->id)}}" 
                                            class
                                            ="btn btn-success btn-sm edit">
                                            {{ __('message.edit') }}</a>
                                    <form action="{{route('modifire.destroy' ,$modifire->id)}}" 
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
        $('#modifires-table').DataTable({
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