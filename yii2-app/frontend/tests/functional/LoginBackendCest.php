<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class LoginBackendCest
{
    // tests
    public function tryToLogin(FunctionalTester $I)
    {
        $I->amOnPage('yii2-app/backend/web/index.php?r=site%2Flogin');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', '123456');
        $I->click('Submit');

        $I->see('Logout (admin)');
    }
}
