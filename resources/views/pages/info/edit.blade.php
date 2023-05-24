@extends('pages.layouts.main')

@section('content')
    <info-edit-page
    :url="'{{ url('/') }}'"
    :api_text="'{{ url('/api/info/text') }}'"
    :api_files="'{{ url('/api/info/files') }}'"
    :data="{{ json_encode($data) }}"
    :files="{{ json_encode($files) }}"
    :id="{{ $id }}">

    </info-edit-page>
@endsection
