@extends('admin.layouts.layout')
@section('content')
<div class="col-md-12 mt-5">
    <div class="card">
        <div class="card-header">
            <h2>New Organization</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="m-2">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="bi bi-patch-exclamation"></i> Error Occured</strong>
                    <ol>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
            <form id="organizationForm" action="{{ route('admin_add_edit_organization') }}" method="post">
                @csrf
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Name<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ old('name', optional($organization)->name) }}" />
                </div>
                <div class="mb-3 form-group">
                    <label for="lead_group_id" class="form-label">Lead Group<sup class="text-danger">*</sup></label>
                    <select class="form-select" name="lead_group_id" id="lead_group_id">
                        <option value="" disabled selected>Choose a lead group</option>
                        <option value="1" @if (old('lead_group_id')==1 || $organization->lead_group_id == 1) selected @endif>One</option>
                        <option value="2" @if (old('lead_group_id')==2 || $organization->lead_group_id == 2) selected @endif>Two</option>
                        <option value="3" @if (old('lead_group_id')==3 || $organization->lead_group_id == 3) selected @endif>Three</option>
                    </select>
                </div>
                <div class="mb-3 form-group">
                    <label for="admin_id" class="form-label">Owner<sup class="text-danger">*</sup></label>
                    <select class="form-select" name="admin_id" id="admin_id">
                        <option value="" disabled selected>Choose a Owner</option>
                        <option value="1" @if (old('admin_id')==1 || $organization->admin_id == 1) selected @endif>One</option>
                        <option value="2" @if (old('admin_id')==2 || $organization->admin_id == 2) selected @endif>Two</option>
                        <option value="3" @if (old('admin_id')==3 || $organization->admin_id == 3) selected @endif>Three</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('page_script')
<script>
    $(document).ready(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                $('#organizationForm').submit()
            }
        });
        $('#organizationForm').validate({
            rules: {
                name: {
                    required: true,
                },

                lead_group_id: {
                    required: true // Add the required rule for the lead_group_id field
                },
                admin_id: {
                    required: true // Add the required rule for the lead_group_id field
                }
            },
            messages: {
                name: {
                    required: "Please provide the Name.",
                },
                lead_group_id: {
                    required: "Please choose a lead group" // Custom error message for the required rule
                },
                admin_id: {
                    required: "Please choose a owner" // Custom error message for the required rule
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        // Show or Hide Password
        $("#password_eye").on('click', function() {
            var passwordInput = $("#password");
            var passwordIcon = $(this);

            if (passwordInput.prop('type') === 'text') {
                passwordInput.prop('type', 'password');
                passwordIcon.removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
            } else {
                passwordInput.prop('type', 'text');
                passwordIcon.removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
            }
        });
    });
</script>
@endpush