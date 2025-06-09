@props([
    'page' => null
])

@props([
    'title' => '',
    'meta_description' => '',
    'description' => ''
])

@php
    $title = $page->getDocumentTitle();
    $description = 'bbb';
    $url = 'ccc';
    $description = 'ggg';
    $image = 'ccc';
@endphp

<meta name="robots" content="index, follow">
<meta name="author" content="{{ config('app.name') }}">
<meta charset="utf-8">

<title>{{ $page->getDocumentTitle() }} | {{ config('app.name') }}</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- favicon  --}}
<link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}" />
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
<meta name="apple-mobile-web-app-title" content="Stadsfonds" />
<link rel="manifest" href="{{ asset('site.webmanifest') }}" />


<meta name="description" content="{{ $page->getMetaDescription() }}">

{{-- Open Graph (Facebook, LinkedIn, etc.) --}}
<meta property="og:title" content="{{ $page->getMetaTitle() }}">
<meta property="og:description" content="{{ $page->getMetaDescription() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ config('app.name') }}">

@if($page->getMetaUrl())
    <meta property="og:url" content="{{ $page->getMetaUrl() }}">
@endif

@if($page->getMetaImage())
    <meta property="og:image" content="{{ $page->getMetaImage() }}">
@endif

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $page->getMetaTitle() }}">
<meta name="twitter:description" content="{{ $page->getMetaDescription() }}">

@if($page->getMetaImage())
    <meta name="twitter:image" content="{{ $page->getMetaImage() }}">
@endif
