@extends('pages.layouts.main')

@section('content')
    <contacts-page
    :url="'{{ url('/') }}'">

    </contacts-page>
@endsection
