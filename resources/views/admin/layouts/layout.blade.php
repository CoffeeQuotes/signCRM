<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignCRM</title>
    <link href="{{ url('/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('admin/css/bootstrap-icons.min.css') }}" />
    @stack('page_css')
</head>

<body class="wm-100">
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-->
            @include('admin.layouts.sidebar')
            <!--./Sidebar-->
            <!--Header-->
            <div class="col" style="padding: 0;">
                @include('admin.layouts.header')
                <!--Header-->
                <div class="container">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('admin/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('admin/js/additional-methods.min.js') }}"></script>
    <script>
        $(document).ready(function() {

        });
    </script>
    @stack('page_script');
</body>

</html>
