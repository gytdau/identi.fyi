<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UserTest extends TestCase
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

    public function testUrlGeneration()
    {
        $user = new User;
        $user->name = "Gytis Daujotas";
        $user->generateUrl();
        $this->assertEquals('gytis-daujotas', $user->url);
    }

    public function testUrlGenerationStripping()
    {
        $user = new User;
        $user->name = "Dr. Gytis Daujotas, III, Jr.";
        $user->generateUrl();
        $this->assertEquals('dr-gytis-daujotas-iii-jr', $user->url);
    }

    public function testPasscodeGeneration()
    {
        $user = new User;
        $user->generatePasscode();
        $this->assertEquals(10, strlen($user->passcode));
    }
}
