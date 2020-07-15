<?php

namespace Tests\arrangefirst_type;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\OpenOutController;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testcreate()
    {
        $response = $this->post('/openout',[
            'user_id' => 1,
            'arrangenumber' => '91',
            'arrangefirst' => 'BULL',
            'first_score' => 50,
            'arrangesecond' => 'T3',
            'second_score' => 9,
            'arrangethird' => 'D16',
            'third_score' => 32,
            'arrangememo' => 'こんにちは',
        ]);
        $response->assertStatus(200);
    }
}

