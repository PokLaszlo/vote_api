<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Services\MeetingReportService;
use Illuminate\Http\Request;

class MeetingController extends Controller {
    public function index() {
        return Meeting::with('creator')->get();
    }

    public function show(Meeting $meeting) {
        // Itt töltjük be a teljes fát: Napirend -> Határozat -> Szavazat -> Felhasználó
        return $meeting->load(["creator", "agendaItems.resolutions.votes.user"]);
    }

    public function store(Request $request) {
        $this->authorize('create', Meeting::class);
        $data = $request->validate([
            'title' => 'required|string',
            'meeting_date' => 'required|date',
            'location' => 'required|string',
        ]);
        return Meeting::create([...$data, 'created_by' => auth()->id()]);
    }
}