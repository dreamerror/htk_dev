@extends('pages.layouts.main')

@section('content')
    <customs-page
    :url="'{{ url('/') }}'"
    :api="'{{ url('/api/edit-content') }}'"
    :data="{{ json_encode($data) }}">

    </customs-page>
@endsection
