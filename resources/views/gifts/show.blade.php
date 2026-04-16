@extends('layouts.app')

@section('title', $gift->name)

@section('content')
    <h1>{{ $gift->name }}</h1>

    <p><strong>Prix :</strong> {{ number_format((float) $gift->price, 2, ',', ' ') }} €</p>

    @if (!empty($gift->url))
        <p>
            <strong>URL :</strong>
            <a href="{{ $gift->url }}" target="_blank" rel="noopener noreferrer">{{ $gift->url }}</a>
        </p>
    @endif

    @if (!empty($gift->details))
        <p><strong>Détails :</strong></p>
        <p>{{ $gift->details }}</p>
    @endif

    <div class="actions" style="margin-top: 1rem;">
        <a href="{{ route('gifts.edit', $gift) }}">Modifier</a>
        <form action="{{ route('gifts.destroy', $gift) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    </div>
@endsection

