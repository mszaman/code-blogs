<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Code Blogs</title>
</head>
<body>
    @include('general.layouts.navbar')
    <main class="main-section">
        <div class="dashboard-wrapper">
            @include('admin.layouts.navbar')
            @yield('admin-content')
        </div>
    </main>

    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>