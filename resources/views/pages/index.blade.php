@extends('pages.layouts.main')

@section('content')
    <main-page
    :cards="{{ json_encode($cards) }}"
    :url="'{{url('/')}}'"
    :bg="{{ json_encode($bg) }}">

    </main-page>
@endsection
