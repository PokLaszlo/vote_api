<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Services\MeetingService;
use App\Services\MeetingReportService;
use App\Http\Resources\MeetingResource;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Traits\ApiResponse;

class MeetingController extends Controller
{   
    use ApiResponse;
    public function __construct(protected MeetingService $service
    ) {}
    public function index()
    {
        $meeting = $this->service->index();

        return $this->success(MeetingResource::collection($meeting),"Közgyűlések",200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Meeting::class);
        $meeting = $this->service->create([
            'title' => $request->title,
            'meeting_date' => $request->meeting_date,
            'location' => $request->location,
            'created_by' => auth()->id(),
        ]);
        return $this->created($meeting,"Közgyűlés létrehozva");
    }
    public function show(Meeting $meeting)
    {
        $meeting = $this->service->show($meeting);

        return $this->success(new MeetingResource($meeting),"Közgyűlés részletei",200);
    }
    public function update(Request $request, Meeting $meeting)
    {
        $this->authorize('update', $meeting);

        return $this->service->update(
            $meeting,
            $request->only(['title','meeting_date','location'])
        );
    }
    public function destroy(Meeting $meeting)
    {
        $this->authorize('delete', $meeting);

        $this->service->delete($meeting);
        return $this->noContent();
    }

    public function report(Meeting $meeting, MeetingReportService $m_r_service)
    {
        return $this->created($m_r_service->generate($meeting),"Jegyzőkönyv");
    }
    public function pdf(Meeting $meeting, MeetingReportService $reportService)
    {
        $report = $reportService->generate($meeting);

        return Pdf::loadView('reports.meeting', compact('report'))
            ->download('jegyzokonyv.pdf');
    }
}
