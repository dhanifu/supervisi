@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Hallo, {{ Auth::user()->name }}
                </h6>
            </div>
            <div class="card-body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa voluptatem eveniet commodi a fugit molestiae facere nostrum, quaerat assumenda ullam maxime atque dolore animi quibusdam quo. Impedit ex veniam molestias.
            </div>
        </div>
    </div>
</div>
@endsection
