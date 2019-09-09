@extends('admin.base')

@section('body')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="space-b">
                    <h4 class="header-title">After Effects Packs Table</h4>
                    <button type="button" class="btn btn-flat btn-primary mb-3" onclick="window.location.href = '{{ route('admin.ae-packs.create') }}'">Create Pack</button>
                </div>
                <div class="single-table">
                    <div class="table-responsive">
                        <after-effects-list-component></after-effects-list-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
