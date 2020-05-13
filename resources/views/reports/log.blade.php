@extends('theme.default')

@section('head')
<style>
    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
    top: 10px;
    left: -18px;
    }
</style>
@endsection

@section('heading') 
Activity Log Report
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">Activity Log Report</h4>
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
                <form method="POST" action="{{ route('reports.log') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="from">From</label>
                            <input type="date" class="form-control mt-2" id="from" name="from" value="{{ $request ? $request->from : Carbon\Carbon::now()->subMonth()->format('Y-m-d')  }}" required>
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="to">To</label>
                            <input type="date" class="form-control mt-2" id="to" name="to" value="{{ $request ? $request->to : Carbon\Carbon::now()->format('Y-m-d') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mt-6 row">
                            <label class="bmd-label-floating" for="user">User</label>
                            <select id="user" class="custom-select" name="user">
                                <option value="all" {{ $request ? ($request->user == 'all' ? 'selected' : '') : '' }}>All</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $request ? ($request->user == $user->id ? 'selected' : '') : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                </form>
            </div>
        </div>

        @if($request)
            <div id="results" class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Results</h4>
                </div>
                <div class="card-body ">
                    <table id="activities-table" class="table table-striped table-hover table-responsive" cellspacing="0" width="100%" >
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Description</th>
                                <th>Subject Type</th>
                                <th>Date</th>
                                <th>Properties</th>
                            </tr>
                        </thead>
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
            var params = {
                _token: $('input[name=_token]').val(),
                from: $('input[name=from]').val(),
                to: $('input[name=to]').val(),
                user: $('#user').val()
            };
            
            $('#activities-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('reports.drawLogTable') }}",
                    type: "POST",
                    data: params
                }, 
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'subject_type', name: 'subject_type' },
                    { data: 'date', name: 'date' },
                    { data: 'properties', name: 'properties' },
                ],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "All"]
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
