@extends('pages.layouts.main')

@section('content')
    <cargo-trans-page
    :url="'{{ url('/') }}'"
    :api="'{{ url('/api/edit-content') }}'"
    :data="{{ json_encode($data) }}"
    :auth="{{$auth}}"
    :bg="{{ json_encode($bg) }}">

    </cargo-trans-page>
@endsection
