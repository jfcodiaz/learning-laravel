<?php
namespace Tests\Selenium;

class HelloSeleniumTest extends SeleniumTestCase
{
    public function test_hello_selenium(): void
    {
        $this->goTo('http://www');
        $this->assertElementText('Log in', '#loginBtn')
            ->click();
        $this->fillInputById('email', 'admin@servlocal.com');
        $this->fillInputById('password', 'Password');
        $this->click('button[type="submit"]');
        $this->assertElementText('These credentials do not match our records.', 'li');
        $inputEmail = $this->getById('email');
        $this->assertSame('admin@servlocal.com', $inputEmail->getAttribute('value'));
        $this->fillInputById('password', 'unodostres');
        $this->click('button[type="submit"]');
        $this->assertElementText('Dashboard', 'h2');
    }
}
