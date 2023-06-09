@extends('pages.layouts.main')

@section('content')
    <header-pages
        :bg_image="'/storage/bg/main-bg.jpg'"
        :url="'{{ url('/') }}'"
        :content="'<h1>Страница, к которой вы обратились, не существует</h1>'">

    </header-pages>
@endsection
