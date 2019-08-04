@extends('admin.base')

@section('body')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="space-b">
                    <h4 class="header-title">Category Table</h4>
                    <button type="button" class="btn btn-flat btn-primary mb-3" onclick="window.location.href = '{{ route('admin.categories.create') }}'">Create Category</button>
                </div>
                <div class="single-table">
                    <div class="table-responsive">
                        <categories-table></categories-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
