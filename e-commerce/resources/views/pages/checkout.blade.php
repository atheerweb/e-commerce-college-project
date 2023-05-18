@extends('layouts.frontend')


@section('content')
    @if (isset($user_cart))
        <check-out-page products="{{ $user_cart }}" />
    @endif
@endsection
