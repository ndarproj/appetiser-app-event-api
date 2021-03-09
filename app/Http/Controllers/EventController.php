<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Repositories\EventRepository;

class EventController extends Controller
{
    private $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getEvents()
    {
        return EventResource::collection($this->repository->getEvents());
    }
    public function createEvent(EventRequest $request)
    {
        return (new EventResource($this->repository->createEvent($request->payload())));
    }
}
