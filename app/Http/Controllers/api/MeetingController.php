<?php

namespace App\Http\Controllers\api;

use App\Models\Meeting;
use App\Models\AgendaItem;
use App\Models\Resolution;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Services\MeetingService;

class MeetingController extends Controller
{
    public function __construct(protected MeetingService $meetingService) {}
    
    public function create(MeetingRequest $request)
    {
        $validated = $request->validated();
        return $this->meetingService->create($validated);
    }
    
    public function getMeeting(Meeting $meeting)
    {
        return $this->meetingService->show($meeting);
    }
    public function update(Meeting $meeting, UpdateMeetingRequest $request)
    {
        $validated = $request->validated();
        return $this->meetingService->update($meeting, $validated);
    }
    public function delete(Meeting $meeting)
    {
        return $this->meetingService->delete($meeting);
    }

}