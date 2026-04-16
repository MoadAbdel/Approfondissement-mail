@extends('layouts.app')

@section('title', 'Modifier ' . $gift->name)

@section('content')
    <h1>Modifier un cadeau</h1>

    <form action="{{ route('gifts.update', $gift) }}" method="POST">
        @csrf
        @method('PUT')
        @include('gifts._form', ['gift' => $gift])
        <button type="submit" style="margin-top: 1rem;">Modifier</button>
    </form>
@endsection

