@extends('template')
@section('title', 'Admin Total Feedback Today')
@section('content')

<div id="app">
    <AbsoluteTotal></AbsoluteTotal>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@endsection