@extends('template')
@section('title', 'Admin Chart')
@section('content')
<div id="app">
    <Chart></Chart>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@endsection