@extends('pages.layouts.main')

@section('content')
    <prices-page
    :url="'{{ url('/') }}'"
    :items="{{ json_encode($items) }}">

    </prices-page>
@endsection
