@extends('pages.layouts.main')

@section('content')
    <partners-page
    :url="'{{ url('/') }}'"
    :items="{{ json_encode($data) }}"
    :bg="{{ json_encode($bg) }}">

    </partners-page>
@endsection
