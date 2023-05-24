@extends('pages.layouts.admin')

@section('content')
    <admin-login-page
    :action_url="'{{ url('/api/admin/login') }}'">

    </admin-login-page>
@endsection
