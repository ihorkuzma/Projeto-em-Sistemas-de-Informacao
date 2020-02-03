<?php

use Codeception\Test\Unit;
use frontend\models\Alimento;

/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 19/01/2019
 * Time: 11:07
 */

class crudAlimentoTest extends Unit
{

    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }


    public function testAlimentoValidation()
    {

        $testAlimento = new Alimento();

        $testAlimento->Nome_alimento = 'asdfgasdfgasdfgasdhbfgasdfgasdfgasdfgasdfgasdfgasdfg';
        $this->assertFalse($testAlimento->validate(['Nome_alimento']));

        $testAlimento->Preco= 12345678543850438585093485934859348504985309859485095803495838485438095438095438095430985438095439805809538;
        $this->assertFalse($testAlimento->validate(['Preco']));

        $testAlimento->Stock = 1234131212125678910121;
        $this->assertFalse($testAlimento->validate(['Stock']));

        $testAlimento->Tipo_Alimento_id = 1234567891011;
        $this->assertFalse($testAlimento->validate(['Tipo_Alimento_id']));


    }

    public function testAlimentoInsert(){
        $AlimentoInsert = new Alimento();

        //$AlimentoInsert->id = 5;
        $AlimentoInsert->Nome_alimento = 'Arroz de polvo';
        $AlimentoInsert->Preco = 12;
        $AlimentoInsert->Stock = 8;
        $AlimentoInsert->Tipo_Alimento_id= 1;

        $AlimentoInsert->save();

        $this->tester->seeInDatabase('alimento', ['Nome_alimento'=>'Arroz de polvo', 'Preco'=>12, 'Stock'=>8, 'Tipo_Alimento_id'=>1]);
    }

    public function testClienteUpdate()
    {
        $AlimentoUpdate = Alimento::findOne(['id' => 7]);

        $AlimentoUpdate->id = 7;
        $AlimentoUpdate->Nome_alimento = 'Arroz de cabrito';
        $AlimentoUpdate->Preco = 18;
        $AlimentoUpdate->Stock = 8;
        $AlimentoUpdate->Tipo_Alimento_id = 1;

        $AlimentoUpdate->update();

        $this->tester->seeInDatabase('alimento', ['id' => 7, 'Nome_alimento' => 'Arroz de cabrito', 'Preco' => 18, 'Stock' => 8, 'Tipo_Alimento_id' => 1]);
    }


   public function testClienteDelete(){
        $AlimentoDelete = Alimento::findOne(['id'=>7]);


        $AlimentoDelete->delete();

        $this->tester->dontSeeInDatabase('alimento', ['id' => 7, 'Nome_alimento' => 'Arroz de cabrito', 'Preco' => 18, 'Stock' => 8, 'Tipo_Alimento_id' => 1]);
    }


}