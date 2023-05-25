@extends('pages.layouts.main')

@section('content')
    <info-list-page
    :url="'{{ url('/') }}'"
    :pages="{{ json_encode($items) }}">

    </info-list-page>
@endsection
