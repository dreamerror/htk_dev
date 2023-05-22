@extends('pages.layouts.main')

@section('content')
    <main-page
    :cards="{{ json_encode($cards) }}"
    :url="'{{url('/')}}'">

    </main-page>
@endsection
