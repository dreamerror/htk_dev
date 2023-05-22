@extends('pages.layouts.main')

@section('content')
    <test-page
    :url="'{{ url('/') }}'"
    :api="'{{ url('/api/edit-content') }}'">

    </test-page>
@endsection
