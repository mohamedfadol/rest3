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
{{ __('message.Mats Element Consuming') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">{{ __('message.Mats Element Consuming') }}</h4>
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
                <form method="POST" action="{{ route('showDelSal') }}">
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
            @php($totalSums = 0)
            <div id="results" class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Results</h4>
                </div>
                <div class="card-body ">
                    <table id="detailSal-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>Branch Name</th>
                                <th>Total sales</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>Present</th>
                                <th>Delivery Send</th>
                                <th>Delivery Comes</th>
                                <th>Car</th> 
                            </tr>
                        </thead>
                            @foreach($branches as $branch)
                            @php($sumsArray = $branch->ordersSumByType($startDate, $endDate))
                            <tbody>
                                <tr  class="text-center">
                                    <td>{{$branch->branch_name}}</td>
                                    <td>{{$totalSums += $branch->ordersSum($startDate, $endDate)}}</td>
                                    <td>{{ $sumsArray['in'] }}</td>
                                    <td>{{ $sumsArray['out'] }}</td>
                                    <td>{{ $sumsArray['present'] }}</td>
                                    <td>{{ $sumsArray['delivery-send'] }}</td>
                                    <td>{{ $sumsArray['delivery-comes'] }}</td>
                                    <td>{{ $sumsArray['car'] }}</td>
                                </tr>
                            @endforeach
                            <tr class="text-center">
                                <td>Total : {{ $totalSums }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
 
            $('#detailSal-table').DataTable({
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


