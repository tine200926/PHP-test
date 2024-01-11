<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class NewsCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->postJson('/api/news/category',[
            'title'      => "測試",
            'ranking'   => 1,
        ]);

        $response->assertStatus(200);
        $response->assertJson(function(AssertableJson $json){
            $json
                ->where('success', true)
                ->has('data', function (AssertableJson $json){
                    $json
                        ->whereType('id', 'integer')
                        ->etc()
                        ;
                });
        });
    }
}
