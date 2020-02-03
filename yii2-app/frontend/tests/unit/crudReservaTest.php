<?php namespace frontend\tests;

use frontend\models\Reserva;

class crudReservaTest extends \Codeception\Test\Unit
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
    public function testReservaValidation()
    {
        $testReserva = new Reserva();


        $testReserva->Numero_pessoas = 50000000000000000000645635634623498673476000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
        $this->assertFalse($testReserva->validate(['Numero_pessoas']));

        $testReserva->Cliente_id = 7999999999999999999935643532523452363763423456799999999999999999993564353252345236376342345679999999999999999999356435325234523637634234567999999999999999999935643532523452363763423456;
        $this->assertFalse($testReserva->validate(['Cliente_id']));

        $testReserva->Data_reserva = '';
        $this->assertFalse($testReserva->validate(['Data_reserva']));
    }

    public function testReservaInsert(){
        $testReserva = new Reserva();

        $testReserva->id = 10;
        $testReserva->Numero_pessoas = 11;
        $testReserva->Cliente_id = 2;
        $testReserva->Data_reserva = '2019-01-01';

        $testReserva->save();

        $this->tester->seeInDatabase('reserva', ['id'=>10, 'Numero_pessoas'=>11, 'Cliente_id'=>2, 'Data_reserva'=>'2019-01-01']);
    }

    public function testReservaUpdate(){
        $testReserva = Reserva::findOne(['id'=>10]);

        $testReserva->id = 10;
        $testReserva->Numero_pessoas = 1;
        $testReserva->Cliente_id = 2;
        $testReserva->Data_reserva = '2012-11-11';

        $testReserva->update();

        $this->tester->seeInDatabase('reserva', ['id'=>10, 'Numero_pessoas'=>1, 'Cliente_id'=>2, 'Data_reserva'=>'2012-11-11']);
    }

    public function testReservaDelete(){
        $testReserva = Reserva::findOne(['id'=>10]);


        $testReserva->delete();

        $this->tester->dontSeeInDatabase('reserva', ['id'=>10, 'Numero_pessoas'=>20, 'Cliente_id'=>2, 'Data_reserva'=>'2018-09-09']);
    }








}