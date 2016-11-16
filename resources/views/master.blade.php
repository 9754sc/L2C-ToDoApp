<?php //require_once '_inc/config.php' ?>

@include('header')

<div class="page-header">
    <h1>
        @yield('title', isset($title) ?: '')
    </h1>
</div>

@yield('content')
@include('footer')
