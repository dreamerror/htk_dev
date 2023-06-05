@extends('pages.layouts.main')

@section('content')
    <info-list-page
    :url="'{{ url('/') }}'"
    :pages="{{ json_encode($items) }}"
    :auth="{{ $auth }}"
    :bg="{{ json_encode($bg) }}">

    </info-list-page>
@endsection
