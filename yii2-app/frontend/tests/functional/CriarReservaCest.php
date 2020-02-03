<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 22/01/2019
 * Time: 14:16
 */

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class CriarReservaCest
{

    public function DoReserva (FunctionalTester $I){
        $I->amLoggedInAs(2);
        $I->amOnRoute('/web');

        $I->click('Pedido');
        $I->see('Come Em Casa');
        $I->click('Efectuar Reserva');
        $I->see('Numero Pessoas');
        $I->fillField('Reserva[Numero_pessoas]', 3);
        $I->fillField('Reserva[Data_reserva]', '2019-1-22 20:10');


        // $I->click( 'Adiciona os teus pratos');
        //$I->click(['class' => 'btn btn-success',]);
        //$I->see('Nome do prato');


    }

}