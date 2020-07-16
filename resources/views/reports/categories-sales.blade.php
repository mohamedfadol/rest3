@extends('theme.default')

@section('heading')
{{ __('message.Categories Sales Report') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">{{ __('message.Categories Sales Report') }}</h4>
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
                <form method="POST" action="{{ route('reports.categoriesSales') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="from">{{ __('message.From') }}</label>
                            <input type="date" class="form-control mt-2" id="from" name="from" value="{{ $request ? $request->from : Carbon\Carbon::now()->subMonth()->format('Y-m-d')  }}" required>
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="to">{{ __('message.To') }}</label>
                            <input type="date" class="form-control mt-2" id="to" name="to" value="{{ $request ? $request->to : Carbon\Carbon::now()->format('Y-m-d') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mt-4">
                            <label class="bmd-label" for="branch">{{ __('message.Branch') }}</label>
                            <select id="branch" class="custom-select" name="branch">
                                @if(count($branches) > 0)
                                    <option value="all">All</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}" {{ $request ? ($request->branch == $branch->id ? 'selected' : '') : '' }}>{{$branch->name}}</option>
                                    @endforeach
                                @else
                                    <option value="">Ther's No branches To Add</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="floor" class="bmd-label-floating">{{ __('message.Floor') }}</label>
                            <select id="floor" class="custom-select" name="floor" data-old="{{ $request ? $request->floor : '' }}" title="floor" data-size="7">
                                <option value="all" {{ $request ? ($request->floor == 'all' ? 'selected' : '') : '' }}>All</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="table" class="bmd-label-floating">{{ __('message.Table') }}</label>
                            <select id="table" class="custom-select" name="table" title="table" data-old="{{ $request ? $request->table : '' }}">
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4 mt-4">
                            <label class="bmd-label" for="category">{{ __('message.Category') }}</label>
                            <select id="category" class="custom-select" name="category">
                                <option value="all">All</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ $request ? ($request->category == $category->id ? 'selected' : '') : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mt-6 row">
                            <label class="bmd-label-floating" for="employee">{{ __('message.Added By') }}</label>
                            <select id="employee" class="custom-select" data-old="{{ $request ? $request->employee : '' }}" name="employee">
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 mt-4 pt-1">{{ __('message.Payment Type') }}</label>
                        <div class="col-sm-10 mt-4 checkbox-radios">
                             @if(!empty($paymentTypes)) 
                                @foreach($paymentTypes as $type)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input payment_type" type="checkbox" name="payment_types[]" value="{{$type->id}}" {{ $request ? (in_array($type->id, $request->payment_types) ? 'checked' : '') : 'checked' }}> {{ $type->name }}
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div> 
                    </div>

                    <div class="row">
                        <label class="col-sm-2 mt-4 pt-1">{{ __('message.Order Type') }}</label>
                        <div class="col-sm-10 mt-4 checkbox-radios">
                            @foreach($orderTypes as $type)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input order_type" type="checkbox" name="order_types[]" value="{{ $type->id }}" {{ $request ? (in_array($type->id, $request->order_types) ? 'checked' : '') : 'checked' }}> {{ $type->BillKindNameEnglish }}
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            @endforeach
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
                    @php
                        $totalPrice = 0;
                        $prices = 0;
                        $quantities = 0;
                    @endphp
                    <table id="categories-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('message.Category') }}</th>
                                <th>{{ __('message.Total') }}</th>
                                <th>{{ __('message.Product') }}</th>
                                <th>{{ __('message.Quantitiy') }}</th>
                                <th>{{ __('message.Price') }}</th>
                                <th>{{ __('message.Total Price') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $category)
                                <tr>
                                    <td>{{ $category['category']->name }}</td>
                                    <td>{{ number_format($category['total']) }}</td>
                                    <td colspan="4"></td>
                                </tr>
                                @foreach ($category as $key => $product)
                                    @if (!in_array($key, ['category', 'total']))
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>{{ $product->first()->nameEn }}</td>
                                            <td>{{ $product['totalQuantity'] }}</td>
                                            <td>{{ number_format($product->first()->price) }}</td>
                                            <td>{{ number_format($product->first()->price * $product['totalQuantity']) }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
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

            $.ajax({
                url:handleBrancheChange(),
                success:function(){
                    handleFloorChange();
                }
            })
            
            $('.payment_type').click(function() {
                checked = $("input[name='payment_types[]']:checked").length;
                if(!checked) {
                    alert("You must check at least one payment type.");
                    return false;
                }
            });

            $('.order_type').click(function() {
                checked = $("input[name='order_types[]']:checked").length;
                if(!checked) {
                    alert("You must check at least one order type.");
                    return false;
                }
            });

            $('#categories-table').DataTable({
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

        $('#floor').on('change', e => {
            handleFloorChange()
        })

        $('#branch').on('change', e => {
            handleBrancheChange()
        })

        function handleBrancheChange() {
            $('#floor').empty()
            $('#floor').append('<option value="all">All</option>')
            $('#table').empty()
            $('#table').append('<option value="all">All</option>')
            $('#employee').empty()
            $('#employee').append('<option value="all">All</option>')
            var selectedBranch = $("#branch option:selected").val()
            if(selectedBranch != 0) {
                $.ajax({
                    url: 'branches/' + selectedBranch + '/floors',
                    success: data => {
                        data.floors.forEach(floor =>
                            (floor.id == $('#floor').data('old')) ? $('#floor').append('<option selected value="'+ floor.id +'">' + floor.name + '</option>') : $('#floor').append('<option value="'+ floor.id +'">' + floor.name + '</option>')
                        )
                    }
                })
                $.ajax({
                    url: 'branches/' + selectedBranch + '/employees',
                    success: data => {
                        data.employees.forEach(employee =>
                            (employee.id == $('#employee').data('old')) ? $('#employee').append('<option selected value="'+ employee.id +'">' + employee.name + '</option>') : $('#employee').append('<option value="'+ employee.id +'">' + employee.name + '</option>')
                        )
                    }
                })
            }
        }

        function handleFloorChange() {
            $('#table').empty()
            $('#table').append('<option value="all">All</option>')
            $('#employee').empty()
            $('#employee').append('<option value="all">All</option>')
            var selectedFloor = $("#floor option:selected").val()
            if(selectedFloor != 0) {
                $.ajax({
                    url: 'floors/' + selectedFloor + '/tables',
                    success: data => {
                        data.tables.forEach(table =>
                            ($('#table').data('old') == table.id) ? $('#table').append('<option selected value="'+ table.id +'">' + table.name + '</option>') : $('#table').append('<option value="'+ table.id +'">' + table.name + '</option>')
                        )
                    }
                })
                if(selectedFloor != 'all') {
                    $.ajax({
                        url: 'floors/' + selectedFloor + '/employees',
                        success: data => {
                            data.employees.forEach(employee =>
                                (employee.id == $('#employee').data('old')) ? $('#employee').append('<option selected value="'+ employee.id +'">' + employee.name + '</option>') : $('#employee').append('<option value="'+ employee.id +'">' + employee.name + '</option>')
                            )
                        }
                    })
                } else {
                    var selectedBranch = $("#branch option:selected").val()
                    $.ajax({
                        url: 'branches/' + selectedBranch + '/employees',
                        success: data => {
                            data.employees.forEach(employee =>
                                (employee.id == $('#employee').data('old')) ? $('#employee').append('<option selected value="'+ employee.id +'">' + employee.name + '</option>') : $('#employee').append('<option value="'+ employee.id +'">' + employee.name + '</option>')
                            )
                        }
                    })
                }
            }
        }
    </script>
@endsection
