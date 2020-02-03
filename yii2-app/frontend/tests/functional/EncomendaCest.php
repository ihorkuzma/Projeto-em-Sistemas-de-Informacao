<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 22/01/2019
 * Time: 13:53
 */

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class EncomendaCest
{
    public function DoEncomenda (FunctionalTester $I){
        $I->amLoggedInAs(2);
        $I->amOnRoute('/web');

        $I->click('Pedido');
       $I->see('Come Em Casa');
        $I->click('Come Em Casa');
        $I->see('Adiciona os teus pratos');
        $I->click('localhost:8888/web/alimento/pedido?idvenda=143&idalimento=1');
        $I->see('Quantidade');

       // $I->click( 'Adiciona os teus pratos');
        //$I->click(['class' => 'btn btn-success',]);
        //$I->see('Nome do prato');


    }

}