@extends('template')
@section('title', 'Customer Satisfaction Survey')
@section('content')

<div id="app">
    <Survey></Survey>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@endsection