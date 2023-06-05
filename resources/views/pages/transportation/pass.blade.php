@extends('pages.layouts.main')

@section('content')
    <pass-trans-page
    :url="'{{ url('/') }}'"
    :auth="{{ $auth }}"
    :data="{{ json_encode($data) }}"
    :api_text="'{{ url('/api/edit-content') }}'"
    :bg="{{ json_encode($bg) }}"
    >

    </pass-trans-page>
@endsection
