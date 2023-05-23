@extends('pages.layouts.admin')

@section('content')

    <admin-doc-page
    :api="'{{ url('/api/admin/document') }}'">

    </admin-doc-page>

@endsection
