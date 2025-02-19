@extends('pages.layouts.main')

@section('content')
    <check-page
    :url="'{{ url('/') }}'"
    :bg="{{ json_encode($bg) }}">

    </check-page>
@endsection
