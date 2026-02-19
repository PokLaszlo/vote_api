<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Resolution;
use App\Services\ResolutionService;
use App\Traits\ApiResponse;

class ResolutionController
{
    use ApiResponse;
    public function __construct(
        protected ResolutionService $service
    ) {}

    public function index(){
        return $this->service->index();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'agenda_item_id' => 'required|exists:agenda_items,id',
        ]);
        return $this->service->create($validated);
    }

    public function show(Resolution $resolution)
    {
        
        return $this->service->show($resolution);
    }

    public function update(Request $request, Resolution $resolution)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|string'
        ]);
        return $this->service->update($resolution, $validated);
    }

    public function destroy(Resolution $resolution)
    {
        $this->service->delete($resolution);
        return $this->noContent();
    }
}
