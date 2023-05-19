@extends('pages.layouts.main')

@section('content')
    <main-page
    :cards="{{ json_encode($cards) }}">

    </main-page>
@endsection
