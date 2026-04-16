<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GiftController extends Controller
{
    private function validateGift(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'url' => ['nullable', 'string', 'url:http,https'],
            'details' => ['nullable', 'string'],
            'price' => ['required', 'decimal:0,2'],
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gifts = Gift::query()
            ->orderByDesc('created_at')
            ->get(['id', 'name', 'price']);

        return view('gifts.index', [
            'gifts' => $gifts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gifts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validateGift($request);

        $gift = Gift::create($validated);

        $to = (string) env('MAIL_TO_ADDRESS', 'test@example.com');

        Mail::raw("Le cadeau {$gift->name} a bien été ajouté ({$gift->price}€)", function ($message) use ($to) {
            $message->to($to)->subject('Cadeau ajouté');
        });

        return redirect()
            ->route('gifts.show', $gift)
            ->with('success', 'Cadeau ajouté.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gift $gift)
    {
        return view('gifts.show', [
            'gift' => $gift,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gift $gift)
    {
        return view('gifts.edit', [
            'gift' => $gift,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gift $gift)
    {
        $validated = $this->validateGift($request);

        $gift->update($validated);

        return redirect()
            ->route('gifts.show', $gift)
            ->with('success', 'Cadeau modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();

        return redirect()
            ->route('gifts.index')
            ->with('success', 'Cadeau supprimé.');
    }
}
