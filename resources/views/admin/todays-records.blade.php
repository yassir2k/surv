@extends('template')
@section('title', 'Admin Today\'s Records')
@section('content')

<div id="app">
    <Todaysrecords></Todaysrecords>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@endsection