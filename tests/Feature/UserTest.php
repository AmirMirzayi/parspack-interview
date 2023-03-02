<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_api_working_properly()
    {
        $this->json('get','api/users')
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'name',
                            'email',
                            'email_verified_at',
                            'created_at',
                            'updated_at',
                            'apps' => [
                                '*' => [
                                    'id',
                                    'name',
                                    'platform_id',
                                ]
                            ],
                            'subscription' => [
                                '*' => [
                                    'UID',
                                    'APPID',
                                    'status',
                                    'app' => [
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
