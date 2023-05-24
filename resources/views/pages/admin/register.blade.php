@extends('pages.layouts.admin')

@section('content')
    <admin-register-page
    :action_url="'{{ url('/api/admin/login') }}'">

    </admin-register-page>
@endsection
