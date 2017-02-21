@extends('laralum::layouts.master')
@section('title', __('laralum_dashboard::general.dashboard') )
@section('icon', "ion-speedometer")
@section('subtitle')
    {{ __('laralum_dashboard::general.subtitle', ['name' => Auth::user()->name]) }}
@endsection
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">{{ __('laralum_dashboard::general.home') }}</a></li>
        <li><span href="">{{ __('laralum_dashboard::general.dashboard') }}</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid class="uk-child-width-1-1@l uk-child-width-1-2@xl">
            @forelse($widgets as $widget)
                <div>
                    <div class="uk-card uk-card-default uk-card-body">
                        {!! $widget !!}
                    </div>
                </div>
            @empty
                <center>
                    {{ __('laralum_dashboard::general.no_widgets') }}
                </center>
            @endforelse
        </div>
    </div>
@endsection
