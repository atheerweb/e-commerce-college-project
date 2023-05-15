@extends('layouts.frontend')


@section('content')
    <div class="pt-120 d-flex justify-content-center align-items-start" style="gap: 3em">

        <ticket-card tickets={{ $tickets }} />
    </div>
@endsection
