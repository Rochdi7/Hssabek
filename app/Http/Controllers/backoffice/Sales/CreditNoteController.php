<?php

namespace App\Http\Controllers\Backoffice\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\Store\StoreCreditNoteRequest;
use App\Http\Requests\Sales\Update\UpdateCreditNoteRequest;
use App\Models\Sales\CreditNote;
use Illuminate\Http\Request;

class CreditNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditNotes = CreditNote::with('customer')->paginate(15);
        return response()->json($creditNotes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditNoteRequest $request)
    {
        $creditNote = CreditNote::create($request->validated());
        return response()->json($creditNote, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CreditNote $creditNote)
    {
        $creditNote->load('customer', 'items', 'applications');
        return response()->json($creditNote);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreditNoteRequest $request, CreditNote $creditNote)
    {
        $creditNote->update($request->validated());
        return response()->json($creditNote);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditNote $creditNote)
    {
        $creditNote->delete();
        return response()->json(null, 204);
    }
}
