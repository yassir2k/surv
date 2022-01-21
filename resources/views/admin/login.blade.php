@extends('logintemplate')
@section('title', 'Admin Login Page')
@section('content')
<div id="app">
    <Login></Login>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@endsection