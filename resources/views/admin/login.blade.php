<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME', 'SignCRM') . ' - Sign In' }}</title>
    <link href="{{ url('/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('admin/css/bootstrap-icons.min.css') }}">
</head>

<body class="min-vh-100">
    <div class="container-fluid min-vh-100">
        <div class="row min-vh-100 d-flex justify-content-center align-items-center my-auto">
            <div class="col-md-4 p-4 shadow bg-tertiary rounded">
                <h2 class="text-center display-6 text-secondary"><span class="text-success"><i
                            class="bi bi-clipboard-pulse"></i> SIGN</span>CRM</h2>
                @if ($errors->any())
                    <div class="m-2">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="bi bi-patch-exclamation"></i> Error Occured</strong>
                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ol>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @if (Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-patch-exclamation"></i> Error Occured ~</strong>
                        {{ Session::get('error_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form id="loginForm" method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text text-success">
                                <i class="bi bi-person-badge"></i>
                            </span>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text text-success" style="cursor:pointer">
                                <i id="password_eye" class="bi bi-eye-fill"></i></span>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>
                    <button type="submit" id="submitBtn" class="btn btn-success">Sign In</button>


                </form>
            </div>
        </div>
    </div>
    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('admin/js/additional-methods.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $.validator.setDefaults({
                submitHandler: function() {
                    $('#loginForm').submit()
                }
            });
            $('#loginForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        maxlength: 20,
                        minlength: 6
                    },
                },
                messages: {
                    email: {
                        required: "Please provide the email id or contact administrator.",
                        email: "Please check your email, only valid email is accepted."
                    },
                    password: {
                        required: "Please provide the password.",
                        maxlength: "Your password must not exceeds 20 characters."
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
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
</body>

</html>
