@extends('admin.layouts.layout')
@section('content')
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2>People</h2>
                <div><a class="btn btn-success" href="{{ route('admin_add_edit_person') }}"><i
                            class="bi bi-person-fill-add"></i> New Person</a></div>
            </div>
            <div class="card-body">
                @if (Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-patch-exclamation"></i> Error Occured ~</strong>
                        {{ Session::get('error_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-check-circle-fill"></i> Success ~</strong>
                        {{ Session::get('success_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
