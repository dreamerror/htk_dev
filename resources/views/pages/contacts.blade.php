@extends('pages.layouts.main')

@section('content')
    <contacts-page
    :url="'{{ url('/') }}'"
    :bg="{{ json_encode($bg) }}"
    :htk="{{ json_encode($htk) }}"
    :svh="{{ json_encode($svh) }}"
    :tp="{{ json_encode($tp) }}"
    :additional="{{ json_encode($additional) }}"
    :auth="{{ $auth }}">

    </contacts-page>
@endsection
