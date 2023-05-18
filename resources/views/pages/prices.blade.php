@extends('pages.layouts.app')

@section('content')
    <prices-page
    :items="{{ json_encode($items) }}">

    </prices-page>
@endsection
