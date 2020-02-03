<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 21/01/2019
 * Time: 18:40
 */


namespace frontend\tests\functional;


use frontend\tests\FunctionalTester;

class AlterarClienteCest
{
    public function DadosLogin (FunctionalTester $I){
        $I->amLoggedInAs(2);
        $I->amOnRoute('/');

        $I->click('Perfil');
        $I->see('Actualiza os teus dados');
        $I->click('Actualiza os teus dados');
        $I->see('Update Cliente: 2');
        $I->fillField('Cliente[Nome]', 'Euuu');
        $I->click('Save');
        $I->see('Euuu');

        //$I->click('Save');

    }

}

