@extends('pages.layouts.main')

@section('content')
    <temp-storage-page
    :url="'{{ url('/') }}'"
    :api="'{{ url('/api/edit-content') }}'"
    :data="{{json_encode($data)}}"
    :auth="{{$auth}}"
    :files="{{json_encode($files)}}"
    :bg="{{ json_encode($bg) }}">

    </temp-storage-page>
@endsection
