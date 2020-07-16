@extends('theme.default')

@section('heading')
{{ __('message.Class Products') }} 
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
        <a class="btn btn-primary" href="{{ route('class.create') }}">
            <i class="material-icons">add</i>{{ __('message.Add New Class Products') }}  </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">kitchen</i>
                </div>
                <h4 class="card-title">{{ __('message.Class Products') }}</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="classes-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Class Product Arabic Name') }}</th> 
                                <th>{{ __('message.Class Product English Name') }}</th>
                                <th>{{ __('message.Note') }}</th>
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>
                        @if(count($classProducts) > 0 )
                        <tbody>
                            @foreach($classProducts as $class)
                            <tr>
                                <td>{{ $class->nameAr}}</td>
                                <td>{{ $class->nameEn}}</td>
                                <td>{{ $class->note}}</td>
                                <td class="text-right">
                                    <a 
                                        href="{{route('class.edit',$class->id)}}" 
                                            class ="btn btn-success btn-sm edit">
                                            {{ __('message.edit') }}</a>
                                    <form action="{{route('class.destroy' ,$class->id)}}" 
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
        $('#classes-table').DataTable({
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