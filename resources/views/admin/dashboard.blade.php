@extends('template')
@section('title', 'Admin Dashboard')
@section('content')
<div id="app">
    <Dashboard></Dashboard>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@endsection