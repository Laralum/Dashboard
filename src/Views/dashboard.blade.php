@extends('laralum::layouts.master')
@section('title', trans('dashboard::general.dashboard') )
@section('icon', "mdi-view-dashboard")
@section('subtitle')
    {{ trans('dashboard::general.subtitle', ['name' => Auth::user()->name]) }}
@endsection
@section('content')
    @forelse($widgets as $widget)
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-block">
                        {!! $widget !!}
                    </div>
                </div>
            </div>
        </div>
        <br />

    @empty

        <div class="column">
            <div class="ui padded segment">
                <center>
                    <h1>
                        {{ trans('dashboard::general.no_widgets') }}<br>
                        <i class="frown huge icon"></i>
                    </h1>
                </center>
            </div>
        </div>

    @endforelse
@endsection
