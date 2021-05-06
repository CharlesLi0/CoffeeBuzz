<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginFaildTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('email', 'tasda@rqweqwe.com')
                ->type('password', '12safsaf2eu1393')
                ->click('#login-btn')
                ->assertSee('Can not find this email');
        });
    }
}
