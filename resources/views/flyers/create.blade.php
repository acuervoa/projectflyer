@extends('layout')

@section('content')
    <h1>Selling your Home?</h1>

    <hr>

    <form method="POST" action="/flyers" enctype="multipart/form-data">

        {{ csrf_field() }}
        
        @include('flyers.form');

    </form>
@stop