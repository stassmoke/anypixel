@extends('admin.base')

@section('body')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="space-b">
                    <h4 class="header-title">Counters</h4>
                </div>
                <div class="single-table">
                    <div class="table-responsive">
                        <counter-page-component></counter-page-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
