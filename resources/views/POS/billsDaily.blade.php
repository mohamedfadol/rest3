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
{{ __('message.Daily Orders Report') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">{{ __('message.Daily Orders Report') }}</h4>
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
                <form method="POST" action="{{ route('showBillDaily') }}">
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

                    <div class="row">
                        <div class="form-group col-md-4 mt-4">
                            <label class="bmd-label" for="branch">{{ __('message.Branch') }}</label>
                            <select id="branch" class="custom-select" name="branch">
                                @if(isset($branches))
                                    <option value="all">All</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                                    @endforeach
                                @else
                                    <option value="">Thers No branches To Add</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label class="bmd-label-floating" for="employee">{{ __('message.Added By') }}</label>
                            <select id="users" class="custom-select" name="users">
                                <option value="">Choose One User..</option>
                                    @if(isset($users))
                                        @foreach($users as $user)
                                            <option value="{{$user->Guid}}"> 
                                                {{$user->Name}}
                                            </option>
                                        @endforeach
                                    @else
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}"> 
                                                {{$user->Name}}
                                            </option>
                                        @endforeach
                                    @endif 
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-fill btn-rose">{{ __('message.Submit') }}</button>
                </form>
            </div>
        </div>
        @if(isset($orders))
            <div id="results" class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Results</h4>
                </div>
                <div class="card-body ">
                    <table id="billDaily-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Bill Number') }}</th>
                                <th>{{ __('message.Daily Number') }}</th>
                                <th>{{ __('message.Order Type') }}</th>
                                <th>{{ __('message.Date') }}</th>
                                <th>{{ __('message.Total') }}</th>
                                <th>{{ __('message.Tax') }}</th>
                                <th>{{ __('message.Net') }}</th>
                                <th>{{ __('message.Notes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr  class="even pointer">
                                    <td>{{$order->Number}}</td>
                                    <td>{{$order->DailyNumber}}</td>
                                    <td>{{$order->BillKindName}}</td>
                                    <td>{{$order->Date}}</td>
                                    <td>{{$order->Total}}</td>
                                    <td>{{$order->tax}}</td>
                                    <td>{{$order->Total+$order->tax}}</td> 
                                    <td>{{$order->Notes}}</td>
                                </tr>
                                
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="lead muted text-right m-4">المجموع: {{ $orders->sum('Total') }}</div>
                    <div class="lead muted text-right m-4">الخصم: {{ $orders->sum('Discount') }}</div>
                    <div class="lead muted text-right m-4">الإضافي: {{ $orders->sum('Extra') }}</div>
                    <div class="lead muted text-right m-4">الإضافي: {{ $orders->sum('Service') }}</div>
                    <div class="lead muted text-right m-4">الضريبة: {{ $orders->sum('Tax') }}</div>
                    <div class="lead muted text-right m-4">الصافي: {{ $orders->sum('Total') + $orders->sum('Extra') + $orders->sum('Service') + $orders->sum('Service') + $orders->sum('Tax') - $orders->sum('Discount') }}</div>
        @endif
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
 
            $('#billDaily-table').DataTable({
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
