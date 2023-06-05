@extends('pages.layouts.admin')

@section('content')

    <admin-partners-page
    :api="'{{ url('/api/admin/partner') }}'"
    :data="{{ json_encode($data) }}">

    </admin-partners-page>

@endsection
