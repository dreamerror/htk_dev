@extends('pages.layouts.admin')

@section('content')

    <admin-contacts-page
    :api="'{{ url('/api/admin/contacts') }}'"
    :items="{{ json_encode($data) }}">

    </admin-contacts-page>

@endsection
