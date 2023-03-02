<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_subscription_api_working_properly()
    {
        $this->json('get','api/subscriptions')
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'UID',
                            'APPID',
                            'status',
                            'user' => [
                                'id',
                                'name',
                                'email',
                                'email_verified_at',
                                'created_at',
                                'updated_at'
                            ],
                            'app' => [
                                'id',
                                'name',
                                'platform_id',
                                'platform' => [
                                    'id',
                                    'name',
                                    'url',
                                    'retry_after_hours'
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
