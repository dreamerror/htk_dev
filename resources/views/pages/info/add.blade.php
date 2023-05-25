@extends('pages.layouts.main')

@section('content')
    <info-edit-page
    :url="'{{ url('/') }}'"
    :api_text="'{{ url('/api/info/text') }}'"
    :api_files="'{{ url('/api/info/files') }}'"
    :id="{{ $id }}"
    :auth="1">

    </info-edit-page>
@endsection
