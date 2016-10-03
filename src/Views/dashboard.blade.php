@extends('laralum::layout')
@section('breadcrumb')
    <div class="ui breadcrumb">
        <div class="active section">{{ trans('dashboard::general.dashboard') }}</div>
    </div>
@endsection
@section('title', trans('dashboard::general.dashboard') )
@section('icon', "dashboard")
@section('subtitle')
{{ trans('dashboard::general.subtitle', ['name' => Auth::user()->name]) }}
@endsection
@section('content')
<div class="ui doubling stackable one column grid container">
    @forelse($widgets as $widget)

        <div class="column">
            <div class="ui padded segment ">
                {!! $widget !!}
            </div>
        </div>

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
</div>
@endsection
