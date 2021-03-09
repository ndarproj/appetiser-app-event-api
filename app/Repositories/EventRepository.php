<?php

namespace App\Repositories;

use App\Models\Event;
use Exception;
use Illuminate\Database\QueryException;

class EventRepository extends Event
{
	public function getEvents()
	{
		return $this->get();
	}
	public function createEvent($payload)
	{
		return $this->create($payload);
	}
}
