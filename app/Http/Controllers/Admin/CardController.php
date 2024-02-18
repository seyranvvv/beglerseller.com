<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\CardType;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = Card::orderBy('id', 'desc')
            ->whereHas('section', function ($q) {
                $q->whereId(config('section')->id);
            })
            ->paginate(10);

        return view('admin.cards.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cardTypes = CardType::all();
        return view('admin.cards.create', compact('cardTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CardRequest $request)
    {
        $data = $request->validated();

        $card = config('section')->cards()->create($data);


        if (isset($data['image'])) {
            $card->addImage($data['image']);
        }

        $success =  trans('transAdmin.created');
        return redirect()
            ->route('admin.cards.index')
            ->with([
                'success' => $success,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        $obj = $card;
        $cardTypes = CardType::all();

        return view('admin.cards.edit', compact('obj', 'cardTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CardRequest $request, Card $card)
    {
        $data = $request->validated();
        $card->update($data);

        if (isset($data['image'])) {
            $card->addImage($data['image']);
        }

        $success =  trans('transAdmin.updated   ');
        return redirect()
            ->route('admin.cards.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card->clearMediaCollection('icon');

        $card->delete();
        $success = "Deleted successfully";

        return redirect()
            ->route('admin.cards.index')
            ->with([
                'success' => $success
            ]);
    }
}
