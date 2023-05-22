@extends('pages.layouts.app')

@section('content')
    <temp-storage-page
    :url="'{{ url('/') }}'">

    </temp-storage-page>
@endsection
