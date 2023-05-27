@extends('pages.layouts.main')

@section('content')
    <info-list-page
    :url="'{{ url('/') }}'"
    :pages="{{ json_encode($items) }}"
    :auth="{{ $auth }}">

    </info-list-page>
@endsection
