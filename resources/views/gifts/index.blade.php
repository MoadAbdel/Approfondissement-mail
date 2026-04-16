@extends('layouts.app')

@section('title', 'Liste des cadeaux')

@section('content')
    <h1>Liste des cadeaux</h1>

    @if ($gifts->isEmpty())
        <p>Aucun cadeau pour le moment.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gifts as $gift)
                    <tr>
                        <td>{{ $gift->name }}</td>
                        <td>{{ number_format((float) $gift->price, 2, ',', ' ') }} €</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('gifts.show', $gift) }}">voir</a>
                                <a href="{{ route('gifts.edit', $gift) }}">modifier</a>

                                <form action="{{ route('gifts.destroy', $gift) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

