@extends('theme.default')

@section('head')
<style>
    .table thead tr th {
        font-size: 0.8rem;
        font-weight: bold;
    }
</style>
@endsection

@section('heading')
{{ __('message.Report Of Sales Branch') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">{{ __('message.Report Of Sales Branch') }}</h4>
            </div>
            <div class="card-body ">
                @if (count($errors) > 0)
                    <div class="alert alert-danger py-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('showBillNumber') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="startdate">{{ __('message.From') }}</label>
                            <input type="date" class="form-control mt-2" id="startdate" name="startdate" value="{{Carbon\Carbon::now()->subMonth()->format('Y-m-d')  }}" >
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="enddate">{{ __('message.To') }}</label>
                            <input type="date" class="form-control mt-2" id="enddate" name="enddate" value="{{Carbon\Carbon::now()->format('Y-m-d') }}" >
                        </div>
                    </div>

                    <button type="submit" class="btn btn-fill btn-rose">{{ __('message.Submit') }}</button>
                </form>
            </div>
        </div>
            @if(isset($branches))
            @php($totalsum = 0) 
            @php($totsum = 0)
            <div id="results" class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Results</h4>
                </div>
                <div class="card-body ">
                    <table id="repoSales-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                    </thead>
                        <tbody>
                            @foreach($branches as $branch)
                                <tr  class="text-center">
                                    <td>{{$branch->branch_name}}</td>
                                    <td>{{$totalsum = $branch->ordersSum($startDate,$endDate)}}</td>
                                    <td>{{$totsum += $branch->ordersSum($startDate,$endDate)}}</td>
                                </tr>
                            @endforeach
                            <tr class="text-center">
                                <td> {{ __('message.Net') }} </td>
                                <td>  </td>
                                <td>{{ $totsum }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
 
            $('#repoSales-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'excel',
                'pdf',
                'print'
                ],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50 , 'all']
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






