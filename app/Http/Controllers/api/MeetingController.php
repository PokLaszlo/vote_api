<?php

namespace App\Http\Controllers\api;

use App\Models\Meeting;
use App\Models\AgendaItem;
use App\Models\Resolution;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'meeting_date' => 'required|date|after:now',
            'location' => 'required|string|max:255',
            'agenda_items' => 'required|array|min:1',
            'agenda_items.*.title' => 'required|string',
            'agenda_items.*.description' => 'nullable|string',
            'agenda_items.*.resolution_text' => 'required|string',
        ]);

        try {
            return DB::transaction(function () use ($validated) {
                // 1. Közgyűlés létrehozása
                $meeting = Meeting::create([
                    'title' => $validated['title'],
                    'meeting_date' => $validated['meeting_date'],
                    'location' => $validated['location'],
                    'created_by' => Auth::id(),
                ]);

                // 2. Napirendi pontok és határozatok létrehozása
                foreach ($validated['agenda_items'] as $itemData) {
                    $item = AgendaItem::create([
                        'meeting_id' => $meeting->id,
                        'title' => $itemData['title'],
                        'description' => $itemData['description'],
                        'status' => 'PENDING'
                    ]);

                    Resolution::create([
                        'agenda_item_id' => $item->id,
                        'text' => $itemData['resolution_text'],
                        'requires_unanimous' => false
                    ]);
                }

                return response()->json(['message' => 'Közgyűlés sikeresen létrehozva!', 'id' => $meeting->id], 201);
            });
        } catch (\Exception $e) {
            return response()->json(['message' => 'Hiba történt: ' . $e->getMessage()], 500);
        }
    }
    public function show($id)
    {
        $meeting = \App\Models\Meeting::find($id);
    
        if (!$meeting) {
            return response()->json(['error' => 'A meeting rekord nem létezik az adatbázisban ID: ' . $id], 404);
        }
        try {
            // Lekérjük a meetinget a kapcsolódó adatokkal együtt
            return $meeting->load([
                'agenda_items.resolutions.votes'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Meeting nem található',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}