<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class newTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRequestPage(){
        $user= factory(User::class)->create();

        $this->actingAs($user)
            ->visit('/memberrequests')
            ->see('Warning!');
    }
 public function testHome()
    {
	$user= factory(User::class)->create();
        $this->actingAs($user)
		->visit('/memberrequests')
            ->click('Home')
            ->seePageIs('/Users/create')
		-> Dontsee('member');
    }   
}
