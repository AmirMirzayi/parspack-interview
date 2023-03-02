<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class AppTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_app_api_working_properly()
    {
        $this->json('get','api/apps')
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'name',
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
