<?php

use App\User;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_displays_home_page(){
        $this->visit('/')
            ->see('Youth\'s Voice Main Page')
		-> Dontsee('Logout');;
    }

    public function testUserCreate()
    {
	
        $this->visit('/')
            ->click('Sign up')
            ->seePageIs('/Users/create');
    }

    public function checkRegister(){
        $this->visit('/Users/create')
            ->select('2','radios')
            ->type('Saad','Username')
            ->type('pass','password')
            ->type('Saad','First_name')
            ->type('Abrar','Last_name')
            ->type('1982-12-13','Date_of_birth')
            ->type('01757371216','Phone_number')
            ->type('saad6522@gmail.com','Email_Address')
            ->type('BUET','Campus_name')
            ->press('button')
            ->seePageIs('/Users/create');
    }

    public function check_login(){
        $user = User::first();
        $this->be($user);
    }

    public function check_member_requests_page(){
        $this->visit('/memberrequests')
            ->see('Pending Membership Requests');
    }

    public function check_Events_Home_Page(){
        $this->visit('/')
            ->press('Events')
            ->seePageIs('/Events');
    }

    public function check_Events_create(){
        $this->visit('/Events/create')
            -> select('Fight Against Winter','Event_type')
            ->type ('1','Event_Version')
            ->type('100','Donation')
            ->type('2016-12-13','Event_Starting_Date')
            ->type('Shilpokola','Venue')
            ->press('Submit')
            ->seePageIs('/Events/create');
    }

    public function testHomePage(){
        $user= factory(User::class)->create();

        $this->actingAs($user)
            ->visit('/')
            ->see($user->name);
    }
     

      public function testApplication()
    {
        $this->be(User::find(1));
        $response = $this->call('GET','');

        $this->assertTrue(true);
    }

}
