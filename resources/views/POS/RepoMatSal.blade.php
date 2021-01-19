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
{{ __('message.Report Of Materials Sales') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">{{ __('message.Report Of Materials Sales') }}</h4>
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
                <form method="POST" action="{{ route('showRepSalMats') }}">
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
                            <select id="branch" class="custom-select" name="branch" required>
                                <option value="all">Choose An Branch..</option>
                                @if(isset($branches))
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                                    @endforeach
                                @else
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label class="bmd-label-floating" for="employee">{{ __('message.Added By') }}</label>
                            <select id="users" class="custom-select" name="users" required>
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
            @if(isset($materials))
            <div id="results" class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Results</h4>
                </div>
                <div class="card-body ">
                    <table id="repoSalesMats-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr class="headings">
                                <th>{{ __('message.Code') }}</th>
                                <th>{{ __('message.Mat') }}</th>
                                <th>{{ __('message.Quantitiy') }}</th>
                                <th>{{ __('message.Price') }}</th>
                                <th>{{ __('message.Total') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->Code}}</td>
                                    <td>{{$material->Name1}}</td>
                                    <td>{{number_format($material->Qty,2)}}</td>
                                    <td>{{number_format($material->Price,2)}}</td>
                                    <td>{{number_format($material->Qty * $material->Price,2)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                <div class="lead muted text-right m-4">المجموع: {{ number_format($materials->sum('Qty') *  $materials->sum('Price'),2)}}</div>
            @endif
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $('#repoSalesMats-table').DataTable({
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
