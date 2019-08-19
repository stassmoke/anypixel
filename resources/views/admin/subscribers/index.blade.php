@extends('admin.base')

@section('body')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="space-b">
                    <h4 class="header-title">Subscribers</h4>
                </div>
                <div class="single-table">
                    <div class="table-responsive">
                        <subscribers-page-component></subscribers-page-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
