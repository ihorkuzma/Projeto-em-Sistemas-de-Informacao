<?php namespace frontend\tests;

use Codeception\Module\Cli;
use frontend\models\Cliente;

class crudClienteTest extends \Codeception\Test\Unit
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
    public function testClienteValidation()
    {
        $testCliente = new Cliente();

        $testCliente->Nome = 'testeeeeeeeeeeeeeeeeeeee';
        $this->assertFalse($testCliente->validate(['Nome']));

        $testCliente->Telemovel = 12345678901111112331243211;
        $this->assertFalse($testCliente->validate(['Telemovel']));

        $testCliente->Morada = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssssssssssssssssssssssss';
        $this->assertFalse($testCliente->validate(['Morada']));


    }

    public function testClienteInsert(){
        $ClienteInsert = new Cliente();

        $ClienteInsert->id = 23;
        $ClienteInsert->Nome = 'ihor';
        $ClienteInsert->Telemovel = 123456789;
        $ClienteInsert->Morada = 'Coembroes';

        $ClienteInsert->save();

        $this->tester->seeInDatabase('cliente', ['id'=>23, 'Nome'=>'ihor', 'Telemovel'=>123456789, 'Morada'=>'Coembroes']);
    }

    public function testClienteUpdate(){
        $ClienteInsert = Cliente::findOne(['id'=>23]);

        $ClienteInsert->id = 23;
        $ClienteInsert->Nome = 'ricardo';
        $ClienteInsert->Telemovel = 923456789;
        $ClienteInsert->Morada = 'dsfdsfdsf';

        $ClienteInsert->update();

        $this->tester->seeInDatabase('cliente', ['id'=>23, 'Nome'=>'ricardo', 'Telemovel'=>923456789, 'Morada'=>'dsfdsfdsf']);
    }

    public function testClienteDelete(){
        $ClienteInsert = Cliente::findOne(['id'=>23]);


        $ClienteInsert->delete();

        $this->tester->dontSeeInDatabase('cliente', ['id'=>23, 'Nome'=>'ricardo', 'Telemovel'=>923456789, 'Morada'=>'dsfdsfdsf']);
    }


}