@extends('theme.default')

@section('heading')
Products Sales Report
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">Products Sales Report</h4>
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
                <form method="POST" action="{{ route('reports.productsSales') }}">
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
                        <div class="form-group col-md-4 mt-4">
                            <label class="bmd-label" for="branch">Branch</label>
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
                            <label for="floor" class="bmd-label-floating">Floor</label>
                            <select id="floor" class="custom-select" name="floor" data-old="{{ $request ? $request->floor : '' }}" title="floor" data-size="7">
                                <option value="all" {{ $request ? ($request->floor == 'all' ? 'selected' : '') : '' }}>All</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="table" class="bmd-label-floating">Table</label>
                            <select id="table" class="custom-select" name="table" title="table" data-old="{{ $request ? $request->table : '' }}">
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4 mt-4">
                            <label class="bmd-label" for="category">Category</label>
                            <select id="category" class="custom-select" name="category">
                                <option value="all">All</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ $request ? ($request->category == $category->id ? 'selected' : '') : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-4">
                            <label for="product" class="bmd-label-floating">Product</label>
                            <select id="product" class="custom-select" name="product" data-old="{{ $request ? $request->product : '' }}" title="product" data-size="7">
                                <option value="all" {{ $request ? ($request->product == 'all' ? 'selected' : '') : '' }}>All</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 pt-2 mt-4">
                            <label for="sku" class="bmd-label">SKU</label>
                            <input id="sku" class="form-control mt-4" name="sku" title="sku" value="{{ $request ? $request->sku : '' }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mt-6 row">
                            <label class="bmd-label-floating" for="employee">Added by</label>
                            <select id="employee" class="custom-select" data-old="{{ $request ? $request->employee : '' }}" name="employee">
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 mt-4 pt-1">Payment Type</label>
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
                        <label class="col-sm-2 mt-4 pt-1">Order Type</label>
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
                    <table id="products-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Quantitiy</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                @php
                                    $totalPrice += $product->sum('pivot.Qty') * $product->first()->price;
                                    $prices += $product->first()->price;
                                    $quantities += $product->sum('pivot.Qty');
                                @endphp
                                <tr>
                                    <td>{{ $product->first()->nameEn }}</td>
                                    <td>{{ $product->first()->sku }}</td>
                                    <td>{{ $product->first()->category->name }}</td>
                                    <td>{{ $product->sum('pivot.Qty') }}</td>
                                    <td>{{ $product->first()->price }}</td>
                                    <td>{{ number_format($product->sum('pivot.Qty') * $product->first()->price) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-secondary text-white">
                                <th>{{ $products->count() }}</th>
                                <th></th>
                                <th></th>
                                <th>{{ $quantities }}</th>
                                <th>{{ $prices }}</th>
                                <th>{{ number_format($totalPrice) }}</th>
                            </tr>
                        </tfoot>
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
            handleCategoryChange()

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

            $('#products-table').DataTable({
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

        $('#branch').on('change', e => {
            handleBrancheChange()
        })

        $('#floor').on('change', e => {
            handleFloorChange()
        })

        $('#category').on('change', e => {
            handleCategoryChange()
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

        function handleCategoryChange() {
            $('#product').empty()
            $('#product').append('<option value="all">All</option>')
            var selectedCategory = $("#category option:selected").val()
            $.ajax({
                url: 'categories/' + selectedCategory + '/products',
                success: data => {
                    data.products.forEach(product =>
                        ($('#product').data('old') == product.id) ? $('#product').append('<option selected value="'+ product.id +'">' + product.nameEn + '</option>') : $('#product').append('<option value="'+ product.id +'">' + product.nameEn + '</option>')
                    )
                }
            })
        }
    </script>
@endsection
