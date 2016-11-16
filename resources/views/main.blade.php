@extends('master')

@section('title', $title)

@section('content')

    @include('partials.error')


    @if( session()->has('message') )

        @include('partials.message', [
            'message' => session('message'),
            'type' => 'success'])

    @endif

    <ul class="list-group col-sm-6">

        @forelse($items as $item)
            <li class="list-group-item">
                {{ $item->text }}
                <div class="controls pull-right">
                    <a href="{{ url('edit', ['id' => $item->id]) }}" class="edit-link">edit</a>
                    <a href="{{ url('remove', ['id' => $item->id]) }}" class="delete-link text-muted glyphicon glyphicon-remove"></a>
                </div>
            </li>
        @empty
            <div>All done. GO and grab yourself some chocolate!</div>
        @endforelse
    </ul>

    {{ Form::open([ 'url' => '/', 'class' => 'col-sm-6' ]) }}
        <p class="form-group">
            {{ Form::textarea('text', null, ['rows'=>'3', 'class' => 'form-control'] ) }}
        </p>
        <p class="form-group">
            {{ Form::button('add new thing', ['type'=>'submit', 'class'=>'btn-sm btn-danger'] ) }}
        </p>
    {{ Form::close() }}


@stop