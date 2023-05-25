@extends('pages.layouts.main')

@section('content')
    <transportation-page
    :url="'{{ url('/') }}'">

    </transportation-page>
@endsection
