<?php

namespace App\Http\Controllers\api;

use App\Models\AgendaItem;
use App\Services\AgendaItemService;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class AgendaItemController
{
    use ApiResponse;
    public function __construct(
        protected AgendaItemService $service
    ) {}
    public function store(Request $request)
    {
        $this->authorize('create', AgendaItem::class);
        return $this->service->create($request->all());
    }
    public function update(Request $request, AgendaItem $agendaItem)
    {
        $this->authorize('update', $agendaItem);
        return $this->service->update($agendaItem, $request->all());
    }
    public function destroy(AgendaItem $agendaItem)
    {
        $this->authorize('delete', $agendaItem);
        $this->service->delete($agendaItem);
        return $this->noContent();
    }
}
