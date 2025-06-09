@props([
    'page' => null
])

@extends('layouts.app')

@section('content')
    {{ $page->name }}
@endsection