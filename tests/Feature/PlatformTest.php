<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class PlatformTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_platform_api_working_properly()
    {
        $this->json('get', 'api/platforms')
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'name',
                            'url',
                            'retry_after_hours',
                            'apps' => [
                                '*' => [
                                    'id',
                                    'name',
                                    'platform_id'
                                ]
                            ]
                        ]
                    ],
                    'success'
                ]
            )
            ->assertStatus(Response::HTTP_OK);
    }
}
