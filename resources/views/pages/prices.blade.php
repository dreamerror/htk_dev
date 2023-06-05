@extends('pages.layouts.main')

@section('content')
    <prices-page
    :url="'{{ url('/') }}'"
    :items="{{ json_encode($items) }}"
    :bg="{{ json_encode($bg) }}"
    :auth="{{ $auth }}">

    </prices-page>
@endsection
