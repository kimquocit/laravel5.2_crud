<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BasicTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {
    	$this->assertTrue(true);
    }

    public function testBasicExample()
    {
    	$this->visit('/')
    	->click('Tasks')
    	->seePageIs('/task');
    }

    public function testNewTaskRegistration()
    {
    	$this->visit('/task/create?')
    	->type('Taylor', 'title')
    	->type('Ken', 'body')
    	->press('Create')
    	->seePageIs('/task');
    }

    public function testJson()
    {
    	$this->json('POST', '/register', ['name' => 'Sally', 'email' => 'Sally@gmail.com', 'password' => '123456', 'password_confirmation' => '123456'])
    	->seeJson([
    		'created' => true,
    		]);
    }

    public function testDatabase()
    {
    	$this->seeInDatabase('users', ['email' => 'kimquoc88@gmail.com']);
    }

    public function testDatabaseFactory()
    {
    	$user = factory(App\User::class)->create([
    		'name' => 'Abigail',
    		]);
    }
}
