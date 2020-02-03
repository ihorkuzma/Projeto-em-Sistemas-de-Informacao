<?php namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;

class LoginRCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        //$I->amOnPage('/');

        $I->amOnPage('site/login');
        $I->click('Login');
        $I->fillField('LoginForm[username]', 'user');
        $I->fillField('LoginForm[password]', '123456');
        $I->click('Submit');
        $I->see('Sempre do melhor.');
        $I->wait(15);
    }

    public function checkLogin (AcceptanceTester $I){



    }
}
