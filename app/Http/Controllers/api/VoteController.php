<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

use App\Models\Resolution;
use App\Models\Vote;
use App\Services\VoteService;

class VoteController extends Controller
{
    use ApiResponse;
    public function __construct(
        protected VoteService $service
    ) {}

    public function store(Request $request, Resolution $resolution)
    {
        // $this->authorize('vote', $resolution);

        return $this->service->vote(
            auth()->user(),
            $resolution,
            $request->vote
        );
    }

    public function result(Resolution $resolution)
    {
        return $this->created(
            $this->service->calculateResult($resolution),
            "Szavazás eredmények"
        );
    }
}
