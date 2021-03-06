@extends('theme.default')

@section('heading')
{{ __('message.Printers') }}
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
        <a class="btn btn-primary" href="{{ route('printer.create') }}">
            <i class="material-icons">add</i>{{ __('message.Add New Printer') }} </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">restaurant_menu</i>
                </div>
                <h4 class="card-title">{{ __('message.Printers') }}</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="printers-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Printer Arabic Name') }}</th>
                                <th>{{ __('message.Printer English Name') }}</th>
                                <th>{{ __('message.Printer') }}</th>
                                <th>{{ __('message.Printer Name') }}</th>
                                <th>{{ __('message.Printer Index') }}</th>
                                <th>{{ __('message.Copies Number') }}</th>
                                <th>{{ __('message.Branch') }}</th>
                                <th>{{ __('message.Note') }}</th> 
                                <th class="disabled-sorting text-right">{{ __('message.Actions') }}</th>
                            </tr>
                        </thead>
                        @if(count($printers) > 0 )
                            <tbody>
                                    @foreach($printers as $printer)
                                <tr>
                                        <td>{{ $printer->name }}</td>
                                        <td>{{ $printer->enName }}</td>
                                        <td>{{ $printer->printer }}</td>
                                        <td>{{ $printer->printerName }}</td>
                                        <td>{{ $printer->printerIndex }}</td>
                                        <td>{{ $printer->copiesNumber }}</td>
                                        <td>{{ $printer->branch->name }}</td>
                                        <td>{{ $printer->note}}</td>

                                        <td class="text-right">
                                            <a 
                                                href="{{route('printer.edit',$printer->id)}}" 
                                                    class
                                                    ="btn btn-success btn-sm edit">
                                                    {{ __('message.edit') }}</a>
                                            <form action="{{route('printer.destroy' ,$printer->id)}}" 
                                                        method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm remove">{{ __('message.delete') }}</button>
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
        $('#printers-table').DataTable({
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