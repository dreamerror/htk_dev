@extends('pages.layouts.admin')

@section('content')

    <admin-cards-page
    :api="'{{ url('/api/admin/card') }}'"
    :items="{{ json_encode($items) }}">

    </admin-cards-page>

@endsection
