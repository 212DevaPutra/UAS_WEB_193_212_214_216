<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header')
</head>

<body>
    <div class="wrapper sidebar_minimize">
        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
        @include('admin.layouts.script')
    </div>
</body>