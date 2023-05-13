@extends('pages.layouts.app')

@section('content')
    <main-page
    :cards="{{ json_encode($cards) }}">

    </main-page>
@endsection
