@extends('admin.base')

@section('body')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Edit After Effects Pack</h4>
                <after-effects-create-edit-component :id="{{ $intPackID }}"></after-effects-create-edit-component>
            </div>
        </div>
    </div>
@endsection
