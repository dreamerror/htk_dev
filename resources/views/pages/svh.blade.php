@extends('pages.layouts.main')

@section('content')
    <temp-storage-page
    :url="'{{ url('/') }}'"
    :api="'{{ url('/api/edit-content') }}'"
    :data="{{json_encode($data)}}"
    :auth="{{$auth}}">

        <template v-slot:text>
        </template>

    </temp-storage-page>
@endsection
