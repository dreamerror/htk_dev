@extends('pages.layouts.admin')

@section('content')

    <admin-bg-page
    :api="'{{ url('/api/admin/background') }}'">

    </admin-bg-page>

@endsection
