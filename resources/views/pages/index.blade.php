@extends('pages.layouts.main')

@section('content')
    <main-page
    :cards="{{ json_encode($cards) }}"
    :url="'{{url('/')}}'"
    :bg="{{ json_encode($bg) }}"
    :data="{{ json_encode($content) }}"
    :auth="{{ $auth }}"
    :api="'{{ url('/api/edit-content') }}'">

    </main-page>
@endsection
