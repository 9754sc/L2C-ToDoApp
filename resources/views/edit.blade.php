@extends('master')

@section('title', $title)

@section('content')

    @include('partials.error')

    @if( session()->has('message') )

        @include('partials.message', [
            'message' => session('message'),
            'type' => 'success'])

    @endif


    <div class="row">

        {{ Form::open([ 'url' => [ url('edit', ['id' => $item->id]) ], 'class' => 'col-sm-6' ]) }}

        <p class="form-group">
        {{ Form::textarea('text', $item->text, ['rows'=>'3', 'class' => 'form-control'] ) }}
        </p>
        <p class="form-group">
        {{ Form::button('edit item', ['type'=>'submit', 'class'=>'btn-sm btn-danger'] ) }}
            <span class="controls">
                <a href="{{ url('/') }}" class="back-link text-muted">back</a>
            </span>
        </p>

        {{ Form::close() }}

    </div>

@stop