@extends('pages.layouts.admin')

@section('content')

    <admin-files-page
    :api="'{{ url('/api/admin/files') }}'"
    :items="{{ json_encode($data) }}">

    </admin-files-page>

@endsection
