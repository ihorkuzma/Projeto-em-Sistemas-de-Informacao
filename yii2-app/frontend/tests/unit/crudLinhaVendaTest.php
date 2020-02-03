<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 19/01/2019
 * Time: 14:09
 */
use Codeception\Test\Unit;
use frontend\models\Linhavenda;

class crudLinhaVendaTest extends \Codeception\Test\Unit
{

    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }


    public function testLinhaVendaValidation()
    {

        $testLinhavenda = new Linhavenda();

        $testLinhavenda->id_alimento=12244444444;
        $this->assertFalse($testLinhavenda->validate(['id_alimento']));

        $testLinhavenda->quantidade = 1238938028428094209384929432809432809432809423980428094332232332232322323232323232323456789;
        $this->assertFalse($testLinhavenda->validate(['quantidade']));

        $testLinhavenda->id_venda = 1234446;
        $this->assertFalse($testLinhavenda->validate(['id_venda']));



    }

    public function testLinhaVendaInsert(){
        $LinhavendaInsert = new Linhavenda();

        $LinhavendaInsert->id =129;
        $LinhavendaInsert->id_alimento=3;
        $LinhavendaInsert->quantidade = 5;
        $LinhavendaInsert->id_venda= 56;

        $LinhavendaInsert->save();

        $this->tester->seeInDatabase('linhavenda', ['id'=>129, 'id_alimento'=>3, 'quantidade'=>5, 'id_venda'=>56]);
    }

    public function testClienteUpdate()
    {
        $LinhaVendaUpdate = Linhavenda::findOne(['id' => 129]);

        $LinhaVendaUpdate->id =129;
        $LinhaVendaUpdate->id_alimento=3;
        $LinhaVendaUpdate->quantidade = 12;
        $LinhaVendaUpdate->id_venda= 56;

        $LinhaVendaUpdate->update();

        $this->tester->seeInDatabase('linhavenda', ['id'=>129, 'id_alimento'=>3, 'quantidade'=>12, 'id_venda'=>56]);
    }


    public function testClienteDelete(){
        $LinhaVendaDelete = Linhavenda::findOne(['id'=>127]);


        $LinhaVendaDelete->delete();

        $this->tester->dontSeeInDatabase('linhavenda', ['id'=>127, 'id_alimento'=>3, 'quantidade'=>5, 'id_venda'=>56]);
    }


}