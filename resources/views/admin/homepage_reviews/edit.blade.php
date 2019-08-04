@extends('admin.base')

@section('body')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Edit Category</h4>
                <edit-homepage-review :id="{{ $intReviewID }}"></edit-homepage-review>
            </div>
        </div>
    </div>
@endsection
