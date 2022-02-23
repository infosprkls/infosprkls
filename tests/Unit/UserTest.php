<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->u = User::all()->random();
    }

    /**
     * A basic unit test to check by whom the user was created.
     *
     * @test
     * @return void
     */
    public function testUserCreatedBy()
    {
        $this->assertInstanceOf("App\User", $this->u->createdBy);
    }

    /**
     * A basic unit test to check the users company.
     *
     * @test
     * @return void
     */
    public function testUserCompany()
    {
        $this->assertInstanceOf("App\Company", $this->u->company);
    }

    /**
     * A basic unit test to check if the user created other users
     *
     * @test
     * @return void
     */
    public function testUserCreatedUsers()
    {
        $this->assertInstanceOf("App\User", $this->u->createdUsers->first(), "!!!!!!!!!!!@@@@@@@Deze test mag in principe falen, omdat niet elke gebruiker dit heeft");
    }

    /**
     * A basic unit test to check by whom the user was created.
     *
     * @test
     * @return void
     */
    public function testUserIsResponsibleFor()
    {
        $this->assertInstanceOf("App\Project", $this->u->isResponsibleFor->first(), "!!!!!!!!!!!@@@@@@@Deze test mag in principe falen, omdat niet elke gebruiker dit heeft");
    }

    /**
     * A basic unit test to check createdProjects
     *
     * @test
     * @return void
     */
    public function testUserCreatedProjects()
    {
        $this->assertInstanceOf("App\Project", $this->u->createdProjects->first(), "!!!!!!!!!!!@@@@@@@Deze test mag in principe falen, omdat niet elke gebruiker dit heeft");
    }

    /**
     * A basic unit test to check createdCompanies
     *
     * @test
     * @return void
     */
    public function testUserCreatedCompanies()
    {
        $this->assertInstanceOf("App\Company", $this->u->createdCompanies->first(), "!!!!!!!!!!!@@@@@@@Deze test mag in principe falen, omdat niet elke gebruiker dit heeft");
    }

    /**
     * A basic unit test to check isContactUserFor
     *
     * @test
     * @return void
     */
    public function testUserisContactUserFor()
    {
        $this->assertInstanceOf("App\Company", $this->u->isContactUserFor, "!!!!!!!!!!!@@@@@@@Deze test mag in principe falen, omdat niet elke gebruiker dit heeft");
    }
    /**
     * A basic unit test to check bookedHours
     *
     * @test
     * @return void
     */
    public function testUserbookedHours()
    {
        $this->assertInstanceOf("App\Hour", $this->u->bookedHours->first(), "!!!!!!!!!!!@@@@@@@Deze test mag in principe falen, omdat niet elke gebruiker dit heeft");
    }

    /**
     * A basic unit test to check createdRules
     *
     * @test
     * @return void
     */
    public function testUsercreatedRules()
    {
        $this->assertInstanceOf("App\Rule", $this->u->createdRules->first(), "!!!!!!!!!!!@@@@@@@Deze test mag in principe falen, omdat niet elke gebruiker dit heeft");
    }
}
