<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Repositories\EventRepository;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EventController extends Controller
{
    private $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getEvents(): ResourceCollection
    {
        return EventResource::collection($this->repository->getEvents());
    }
    public function createEvent(EventRequest $request): EventResource
    {
        return (new EventResource($this->repository->createEvent($request->payload())));
    }
}
