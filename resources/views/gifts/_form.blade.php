@php
    /** @var \App\Models\Gift|null $gift */
    $gift = $gift ?? null;
@endphp

<label for="name">Nom</label>
<input
    type="text"
    name="name"
    id="name"
    value="{{ old('name', $gift?->name) }}"
    required
>
@error('name')
    <p>{{ $message }}</p>
@enderror

<label for="url">URL</label>
<input
    type="text"
    name="url"
    id="url"
    value="{{ old('url', $gift?->url) }}"
    placeholder="https://…"
    required
>
@error('url')
    <p>{{ $message }}</p>
@enderror

<label for="details">Détails (optionnel)</label>
<textarea name="details" id="details">{{ old('details', $gift?->details) }}</textarea>
@error('details')
    <p>{{ $message }}</p>
@enderror

<label for="price">Prix</label>
<input
    type="text"
    name="price"
    id="price"
    value="{{ old('price', $gift?->price) }}"
    required
>
@error('price')
    <p>{{ $message }}</p>
@enderror

