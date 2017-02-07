@extends('laralum::layouts.master')
@section('title', trans('laralum_dashboard::general.dashboard') )
@section('icon', "mdi-view-dashboard")
@section('subtitle')
    {{ trans('laralum_dashboard::general.subtitle', ['name' => Auth::user()->name]) }}
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

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-block">
                        {{ trans('laralum_dashboard::general.no_widgets') }}<br>
                        <span class="mdi mdi-emoticon-sad"></span>
                    </div>
                </div>
            </div>
        </div>
        <br />

    @endforelse
@endsection
