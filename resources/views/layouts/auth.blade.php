
<!DOCTYPE html>
<html lang="en">
<head>
    {{-- meta --}}
    @include('layouts._auth.meta')
    <title>@yield('title') - {{ config('app.name') }}</title>
    {{-- style --}}
    @include('layouts._auth.style')
</head>
<body class="bg-gradient-primary">
    {{-- content --}}
    @yield('content')
    {{-- script --}}
    @include('layouts._auth.script')
</body>
</html>
