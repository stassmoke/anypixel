@extends('admin.base')

@section('body')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Edit Product</h4>
                <product-item :id="{{ $intProductID }}"></product-item>
            </div>
        </div>
    </div>
@endsection
