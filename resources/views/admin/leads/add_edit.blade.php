@extends('admin.layouts.layout')
@section('content')
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">
                <h2>New Person</h2>
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
                <form id="personForm" action="{{ route('admin_add_edit_person') }}" method="post">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="first_name" class="form-label">Firstname<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="Enter firstname" value="{{ old('first_name', optional($person)->first_name) }}" />
                    </div>
                    <div class="mb-3 form-group">
                        <label for="middle_name" class="form-label">Middlename</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                            placeholder="Enter middlename"
                            value="{{ old('middle_name', optional($person)->middle_name) }}" />
                    </div>
                    <div class="mb-3 form-group">
                        <label for="last_name" class="form-label">Lastname<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            placeholder="Enter lastname" value="{{ old('last_name', optional($person)->last_name) }}" />
                    </div>

                    <div class="mb-3 form-group">
                        <label for="lead_group_id" class="form-label">Lead Group<sup class="text-danger">*</sup></label>
                        <select class="form-select" name="lead_group_id" id="lead_group_id">
                            <option value="" disabled selected>Choose a lead group</option>
                            <option value="1" @if (old('lead_group_id') == 1 || $person->lead_group_id == 1) selected @endif>One</option>
                            <option value="2" @if (old('lead_group_id') == 2 || $person->lead_group_id == 2) selected @endif>Two</option>
                            <option value="3" @if (old('lead_group_id') == 3 || $person->lead_group_id == 3) selected @endif>Three</option>
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
                    $('#personForm').submit()
                }
            });
            $('#personForm').validate({
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    lead_group_id: {
                        required: true // Add the required rule for the lead_group_id field
                    }
                },
                messages: {
                    first_name: {
                        required: "Please provide the firstname.",
                    },
                    last_name: {
                        required: "Please provide the lastname.",
                    },
                    lead_group_id: {
                        required: "Please choose a lead group" // Custom error message for the required rule
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
