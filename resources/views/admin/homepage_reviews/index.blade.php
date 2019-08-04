@extends('admin.base')

@section('body')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="space-b">
                    <h4 class="header-title">Homepage Reviews</h4>
                    <button type="button" class="btn btn-flat btn-primary mb-3" onclick="window.location.href = '{{ route('admin.homepage-reviews.create') }}'">Create Review</button>
                </div>
                <div class="single-table">
                    <div class="table-responsive">
                        <homepage-reviews-table></homepage-reviews-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
