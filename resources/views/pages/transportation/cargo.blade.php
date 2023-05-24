@extends('pages.layouts.main')

@section('content')
    <cargo-trans-page
    :url="'{{ url('/') }}'"
    :api="'{{ url('/api/edit-content') }}'"
    :data="{{ json_encode($data) }}"
    :auth="{{$auth}}">

    </cargo-trans-page>
@endsection
