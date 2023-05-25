@extends('pages.layouts.main')

@section('content')
    <partners-page
    :url="'{{ url('/') }}'"
    :items="{{ json_encode($data) }}">

    </partners-page>
@endsection
