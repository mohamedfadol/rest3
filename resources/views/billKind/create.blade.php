@extends('theme.default')

@section('heading')
Add a BillKinds
@endsection

@section('content') 
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">bill_kind</i>
                </div>
                <h4 class="card-title">Add a BillKinds</h4>
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
                <form method="Post" action="{{ route('billKind.create') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="BillKindNumber">BillKind Number</label>
                            <input type="number" name="BillKindNumber" class="form-control" id="BillKindNumber">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="BillKindName">BillKind Name</label>
                            <input type="text" name="BillKindName" class="form-control" id="BillKindName">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="BillKindNameEnglish">BillKind Name English</label>
                            <input type="text" name="BillKindNameEnglish" class="form-control" id="BillKindNameEnglish">
                        </div>
                    </div>
 
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                        <button type="submit" class="btn btn-fill btn-rose">Submit and new</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
