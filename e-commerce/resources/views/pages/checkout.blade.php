@extends('layouts.frontend')


@section('content')
    <div class="pt-120 d-flex justify-content-center align-items-start" style="gap: 3em">
        <div class=" d-flex flex-column justify-content-center align-items-center">
            @if (isset($user_cart))
                <cart-product products="{{ $user_cart }}" />
            @endif
        </div>
        <order-summary products="{{ $user_cart }}" />
    </div>
@endsection
