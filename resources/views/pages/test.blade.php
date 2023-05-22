@extends('pages.layouts.main')

@section('content')
    <test-page
    :url="'{{ url('/') }}'">

    </test-page>
@endsection
