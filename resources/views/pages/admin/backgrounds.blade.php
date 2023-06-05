@extends('pages.layouts.admin')

@section('content')

    <admin-bg-page
    :api="'{{ url('/api/admin/background') }}'"
    :data="{{ json_encode($data) }}">

    </admin-bg-page>

@endsection
