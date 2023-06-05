@extends('pages.layouts.main')

@section('content')
    <transportation-page
    :url="'{{ url('/') }}'"
    :bg="{{ json_encode($bg) }}">

    </transportation-page>
@endsection
