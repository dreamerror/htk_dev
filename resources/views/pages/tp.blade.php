@extends('pages.layouts.main')

@section('content')
    <customs-page
    :url="'{{ url('/') }}'"
    :api="'{{ url('/api/edit-content') }}'"
    :data="{{ json_encode($data) }}"
    :auth="{{$auth}}"
    :bg="{{ json_encode($bg) }}"
    :files="{{ json_encode($files) }}">

    </customs-page>
@endsection
