@include('admin.partials._header')
@include('admin.partials._nav')
@include('admin.partials._aside')
<div id="app">
    <div class="container">@include('admin.partials._messages')</div>
    @yield('content')
</div>
@include('admin.partials._footer')