<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 19/01/2019
 * Time: 19:15
 */


namespace frontend\tests\functional;


use frontend\tests\FunctionalTester;

class LoginRCest

{
    public function tryLogin (FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
        $I->fillField('LoginForm[username]', 'user');
        $I->fillField('LoginForm[password]', '123456');
        $I->click('Submit');

        $I->see('Sair da conta de (user)');

    }

}