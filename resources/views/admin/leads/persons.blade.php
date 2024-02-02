@extends('admin.layouts.layout')
@push('page_css')
    <link rel="stylesheet" href="{{ url('admin/css/dataTables.bootstrap5.min.css') }}" />
@endpush
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
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <!-- id 	first_name 	middle_name 	last_name 	lead_group_id 	admin_id 	-->
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Lastname</th>
                            <th>Lead Group</th>
                            <th>Owner</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($persons as $person)
                            <tr>
                                <td>{{ $person['first_name'] }}</td>
                                <td>{{ $person['middle_name'] }}</td>
                                <td>{{ $person['last_name'] }}</td>
                                <td>{{ $person['lead_group_id'] }}</td>
                                <td>{{ $person['admin_id'] }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('page_script')
    <script src="{{ url('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            new DataTable('#example')
        })
    </script>
@endpush
