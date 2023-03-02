<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class HistoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_history_api_working_properly()
    {
        $this->json('get','api/histories')
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'at_date',
                            'expired_count',
                            'platform_id',
                            'platform' => [
                                'id',
                                'name',
                                'url',
                                'retry_after_hours',
                            ]
                        ]
                    ],
                    'success'
                ]
            )
            ->assertStatus(Response::HTTP_OK);
    }
}
