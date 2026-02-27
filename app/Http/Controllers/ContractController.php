<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'collaborator_id' => ['required', 'exists:collaborators,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'salary' => ['required', 'numeric', 'min:1'],
            'contract_type' => ['required', 'string'],
        ]);

        Contract::create($validated);

        return redirect()->back();
    }

    public function update(Request $request, Contract $contract)
    {
        $validated = $request->validate([
            'collaborator_id' => ['required', 'exists:collaborators,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'salary' => ['required', 'numeric', 'min:1'],
            'contract_type' => ['required', 'string'],
        ]);

        $contract->update($validated);

        return redirect()->back();
    }
}