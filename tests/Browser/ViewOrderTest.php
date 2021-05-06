<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewOrderTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Manager')
                ->type('account', 'edgar')
                ->type('password', '123')
                ->click('#login-btn')
                ->click('#order-list-btn')
                ->assertSee('Order Table');
        });
    }
}
