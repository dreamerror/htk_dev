@extends('pages.layouts.admin')

@section('content')

    <admin-partners-page
    :api="'{{ url('/api/admin/partner') }}'"
    :data="{{ json_encode($data) }}"
    :delete_api="'{{ url('/api/admin/delete/partner') }}'">

    </admin-partners-page>

@endsection
