<?php

namespace App\Repositories;

use App\Models\Event;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;

class EventRepository extends Event
{
	public function getEvents(): Collection
	{
		return $this->get();
	}
	public function createEvent($payload): Event
	{
		return $this->create($payload);
	}
}
