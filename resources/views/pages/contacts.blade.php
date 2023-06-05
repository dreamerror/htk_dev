@extends('pages.layouts.main')

@section('content')
    <contacts-page
    :url="'{{ url('/') }}'"
    :bg="{{ json_encode($bg) }}">

    </contacts-page>
@endsection
