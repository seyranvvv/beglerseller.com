<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = Contact::orderBy('id', 'desc')
            ->whereHas('section', function ($q) {
                $q->whereId(config('section')->id);
            })
            ->paginate(10);

        return view('admin.contacts.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $obj = $contact;
        return view('admin.contacts.edit', compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $data = $request->validated();
        $contact->update($data);

        $success =  trans('transAdmin.updated');
        return redirect()
            ->route('admin.contacts.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
