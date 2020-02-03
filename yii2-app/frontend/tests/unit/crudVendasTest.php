<?php namespace frontend\tests;

use frontend\models\Vendas;

class crudVendasTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testVendasValidation()
    {
        $testVendas = new Vendas();

        $testVendas->Cliente_id = 1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
        $this->assertFalse($testVendas->validate(['Cliente_id']));

        $testVendas->Tipo_venda_id = 1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
        $this->assertFalse($testVendas->validate(['Tipo_venda_id']));

        $testVendas->id_mesa = 1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
        $this->assertFalse($testVendas->validate(['id_mesa']));

    }

    public function testVendasInsert(){
        $testVendas = new Vendas();

        $testVendas->id=95;

        $testVendas->Cliente_id = 2;
        $testVendas->Tipo_venda_id = 1;
        $testVendas->id_mesa = 23;

        $testVendas->save();

        $this->tester->seeInDatabase('vendas', ['id'=>95, 'Cliente_id'=>2, 'Tipo_venda_id'=>1, 'id_mesa'=>23]);
    }

    public function testVendasUpdate(){
        $testVendas = Vendas::findOne(['id'=>95]);

        $testVendas->id = 95;
        $testVendas->Cliente_id = 2;
        $testVendas->Tipo_venda_id = 2;
        $testVendas->id_mesa = 24;

        $testVendas->update();

        $this->tester->seeInDatabase('vendas', ['id'=>95, 'Cliente_id'=>2, 'Tipo_venda_id'=>2, 'id_mesa'=>24]);
    }


    public function testVendasDelete(){
        $testVendas = Vendas::findOne(['id'=>95]);


        $testVendas->delete();

        $this->tester->dontSeeInDatabase('vendas', ['id'=>95, 'Cliente_id'=>2, 'Tipo_venda_id'=>2, 'id_mesa'=>24]);
    }

}