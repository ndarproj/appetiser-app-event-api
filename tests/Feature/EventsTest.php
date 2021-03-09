<?php

namespace Tests\Feature;

use App\Domain\EventDomain;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EventsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /** @test */
    public function a_user_can_add_events()
    {
        $getRandomDaysOfWeek = array_rand(EventDomain::DAYS_OF_WEEK, rand(1, 6));
        $date = Carbon::now();

        $attributes = [
            'name' => $this->faker->name,
            'days_of_week' => $getRandomDaysOfWeek,
            'start_date' => $date->toDateString(),
            'end_date' => $date->addDays(rand(1, 100))->toDateString()
        ];

        $response = $this->postJson('api/event', $attributes);


        $response
            ->assertStatus(201)
            ->assertJsonPath('data.name', $attributes['name']);
    }
}
