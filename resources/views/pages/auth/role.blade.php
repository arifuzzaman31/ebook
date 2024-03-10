@extends('layout.app')
@section('title', 'Role | EBOOK')
@section('content')
<div id="tableHover" class="col-lg-12 col-12 layout-spacing" style="padding: 25px 0;">
    <view-role :roles="{{ $roles }}" :permissions="{{ $permission }}" />
</div>

@endsection

@push('script')
<script src="{{ asset('js/app.js') }}"></script>
@endpush
