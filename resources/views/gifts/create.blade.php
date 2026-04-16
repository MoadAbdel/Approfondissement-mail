@extends('layouts.app')

@section('title', 'Ajouter un cadeau')

@section('content')
    <h1>Ajouter un cadeau</h1>

    <form action="{{ route('gifts.store') }}" method="POST">
        @csrf
        @include('gifts._form')
        <button type="submit" style="margin-top: 1rem;">Enregistrer</button>
    </form>
@endsection

