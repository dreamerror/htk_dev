@extends('pages.layouts.main')

@section('content')
    <transit-trans-page
    :url="'{{ url('/') }}'"
    :auth="{{ $auth }}"
    :data="{{ json_encode($data) }}"
    :api_text="'{{ url('/api/edit-content') }}'">

    </transit-trans-page>
@endsection
