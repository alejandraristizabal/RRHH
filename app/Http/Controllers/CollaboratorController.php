<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return response()->json(Collaborator::all());
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'      => ['required', 'string'],
            'last_name'       => ['required', 'string'],
            'document_type'   => ['required', 'string'],
            'document_number' => [
                'required',
                Rule::unique('collaborators')->whereNull('deleted_at')
            ],
            'birth_date'      => ['required', 'date'],
            'email'           => [
                'required',
                'email',
                Rule::unique('collaborators')->whereNull('deleted_at')
            ],
            'phone_number'    => ['required', 'string'],
            'address'         => ['required', 'string'],
        ]);

        Collaborator::create($validated);

        return redirect()->route('collaborators.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $collaborator = Collaborator::findOrFail($id);

        $validated = $request->validate([
            'first_name'      => ['required', 'string'],
            'last_name'       => ['required', 'string'],
            'document_type'   => ['required', 'string'],
            'document_number' => [
                'required',
                Rule::unique('collaborators')
                    ->ignore($collaborator->id)
                    ->whereNull('deleted_at')
            ],
            'birth_date'      => ['required', 'date'],
            'email'           => [
                'required',
                'email',
                Rule::unique('collaborators')
                    ->ignore($collaborator->id)
                    ->whereNull('deleted_at')
            ],
            'phone_number'    => ['required', 'string'],
            'address'         => ['required', 'string'],
        ]);

        $collaborator->update($validated);

        return redirect()->route('collaborators.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collaborator = Collaborator::findOrFail($id);
        $collaborator->delete();

        return redirect()->route('collaborators.index');
    }
}