
<!DOCTYPE html>
<html lang="en">
<head>
    {{-- meta --}}
    @include('layouts._dashboard.meta')
    <title>@yield('title') - {{ config('app.name') }}</title>
    {{-- style --}}
    @include('layouts._dashboard.style')
</head>
<body id="page-top">
    <div id="wrapper">
        {{-- sidebar --}}
        @include('layouts._dashboard.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
               {{-- topbar --}}
               @include('layouts._dashboard.topbar')
                <div class="container-fluid">
                    {{-- Content --}}
                    @yield('content')
                </div>
            </div>
            {{-- footer --}}
            @include('layouts._dashboard.footer')
        </div>
    </div>
    <!-- Scroll-->
    @include('layouts._dashboard.scroll')
    {{-- script --}}
    @include('layouts._dashboard.script')
    @include('sweetalert::alert')
</body>
</html>
