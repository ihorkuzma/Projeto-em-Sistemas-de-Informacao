<?php

use yii\db\Migration;

/**
 * Class m181119_165426_init_rbac
 */
class m181119_165426_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181119_165426_init_rbac cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth= Yii::$app->authManager;

        //Encomenda
        $createEncomenda = $auth->createPermission('createEncomenda');
        $createEncomenda->description = 'Cria uma encomenda';
        $auth->add($createEncomenda);

        $readEncomenda = $auth->createPermission('readEncomenda');
        $readEncomenda->description = 'le uma encomenda';
        $auth->add($readEncomenda);

        $updateEncomenda = $auth->createPermission('updateEncomenda');
        $updateEncomenda->description = 'Altera uma encomenda';
        $auth->add($updateEncomenda);

        $deleteEncomenda = $auth->createPermission('deleteEncomenda');
        $deleteEncomenda->description = 'Apaga uma encomenda';
        $auth->add($deleteEncomenda);


        //Classificação
        $createClassificacao = $auth->createPermission('createClassificacao');
        $createClassificacao->description = 'Cria uma classificação';
        $auth->add($createClassificacao);

        $readClassificacao = $auth->createPermission('readClassificacao');
        $readClassificacao->description = 'le uma classificação';
        $auth->add($readClassificacao);

        $updateClassificacao = $auth->createPermission('updateClassificacao');
        $updateClassificacao->description = 'altera uma classificação';
        $auth->add($updateClassificacao);

        $deleteClassificacao = $auth->createPermission('deleteClassificacao');
        $deleteClassificacao->description = 'Apaga uma classificação';
        $auth->add($deleteClassificacao);

        //Alimento
        $createAlimento = $auth->createPermission('createAlimento');
        $createAlimento->description = 'Cria um Alimento';
        $auth->add($createAlimento);

        $readAlimento = $auth->createPermission('readAlimento');
        $readAlimento->description = 'le um Alimento';
        $auth->add($readAlimento);

        $updateAlimento = $auth->createPermission('updateAlimento');
        $updateAlimento->description = 'altera um Alimento';
        $auth->add($updateAlimento);

        $deleteAlimento = $auth->createPermission('deleteAlimento');
        $deleteAlimento->description = 'Apaga uma Alimento';
        $auth->add($deleteAlimento);

        //Reserva
         $createReserva = $auth->createPermission('createReserva');
        $createReserva->description = 'Criar Reserva';
        $auth->add($createReserva);

        $readReserva = $auth->createPermission('readReserva');
        $readReserva->description = 'Ler Reserva';
        $auth->add($readReserva);

        $updateReserva = $auth->createPermission('updateReserva');
        $readReserva->description = 'Atualizar Reserva';
        $auth->add($updateReserva);

        $deleteReserva = $auth->createPermission('deleteReserva');
        $deleteReserva->description = 'Eliminar Reserva';
        $auth->add($deleteReserva);

        //Mesa
        $createMesa = $auth->createPermission('createMesa');
        $createMesa->description = 'Criar Mesa';
        $auth->add($createMesa);

        $readMesa = $auth->createPermission('readMesa');
        $readMesa->description = 'Ler Mesa';
        $auth->add($readMesa);

        $updateMesa = $auth->createPermission('updateMesa');
        $updateMesa->description = 'Atualizar Mesa';
        $auth->add($updateMesa);

        $deleteMesa = $auth->createPermission('deleteMesa');
        $deleteMesa->description = 'Eliminar Mesa';
        $auth->add($deleteMesa);


        //Venda
        $createVenda = $auth->createPermission('createVenda');
        $createVenda->description = 'Criar Venda';
        $auth->add($createVenda);

        $readVenda = $auth->createPermission('readVenda');
        $readVenda->description = 'Ler Venda';
        $auth->add($readVenda);

        $updateVenda = $auth->createPermission('updateVenda');
        $updateVenda->description = 'Atualizar Venda';
        $auth->add($updateVenda);

        $deleteVenda = $auth->createPermission('deleteVenda');
        $deleteVenda->description = 'Eliminar Venda';
        $auth->add($deleteVenda);

        //Tipo_Alimento
        $createTipoAlimento = $auth->createPermission('createTipoAlimento');
        $createTipoAlimento->description = 'Criar TipoAlimento';
        $auth->add($createTipoAlimento);

        $readTipoAlimento = $auth->createPermission('readTipoAlimento');
        $readTipoAlimento->description = 'Ler TipoAlimento';
        $auth->add($readTipoAlimento);

        $updateTipoAlimento = $auth->createPermission('updateTipoAlimento');
        $updateTipoAlimento->description = 'Atualizar TipoAlimento';
        $auth->add($updateTipoAlimento);

        $deleteTipoAlimento = $auth->createPermission('deleteTipoAlimento');
        $deleteTipoAlimento->description = 'Eliminar TipoAlimento';
        $auth->add($deleteTipoAlimento);




        // criar encomenda
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createEncomenda);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createEncomenda);
        $auth->addChild($admin, $author);

       //read encomenda

        $auth->addChild($author, $readEncomenda);



        $auth->addChild($admin, $readEncomenda);


//update encomenda

        $auth->addChild($author, $updateEncomenda);


        $auth->addChild($admin, $updateEncomenda);



        //delete encomenda
       /* $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $deleteEncomenda);


        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $deleteEncomenda);
        $auth->addChild($admin, $author);*/



        // criar classificacao

        $auth->addChild($author, $createClassificacao);



        //read classificacao

        $auth->addChild($author, $readClassificacao);



        $auth->addChild($admin, $readClassificacao);


//update classificacao

        $auth->addChild($author, $updateClassificacao);



        $auth->addChild($admin, $updateClassificacao);



        //delete classificacao

        $auth->addChild($author, $deleteClassificacao);



        $auth->addChild($admin, $deleteClassificacao);



        // criar alimento

        $auth->addChild($author, $createAlimento);

       /* $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createAlimento);
        $auth->addChild($admin, $author);*/

        //read alimento

        $auth->addChild($author, $readAlimento);



        $auth->addChild($admin, $readAlimento);


//update alimento

        $auth->addChild($author, $updateAlimento);


        /*$admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateAlimento);
        $auth->addChild($admin, $author);*/


        //delete alimento
        /*$author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $deleteAlimento);


        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $deleteAlimento);
        $auth->addChild($admin, $author);*/

        // criar Reserva

        $auth->addChild($author, $createReserva);


        $auth->addChild($admin, $createReserva);


        //read Reserva

        $auth->addChild($author, $readReserva);



        $auth->addChild($admin, $readReserva);


//update Reserva

        $auth->addChild($author, $updateReserva);



        $auth->addChild($admin, $updateReserva);


        //delete Reserva
       /* $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $deleteReserva);


        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $deleteReserva);
        $auth->addChild($admin, $author);*/

        // criar Mesa

        $auth->addChild($author, $createMesa);


        $auth->addChild($admin, $createMesa);


        //read Mesa

        $auth->addChild($author, $readMesa);



        $auth->addChild($admin, $readMesa);


        //update Mesa

        $auth->addChild($author, $updateMesa);


        /*$admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateMesa);
        $auth->addChild($admin, $author);*/


        //delete Mesa
        /*$author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $deleteMesa);


        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $deleteMesa);
        $auth->addChild($admin, $author);*/

        // criar venda

        $auth->addChild($author, $createVenda);

        /*$admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createVenda);
        $auth->addChild($admin, $author);*/

        //read venda

        $auth->addChild($author, $readVenda);



        $auth->addChild($admin, $readVenda);


        //update venda

        $auth->addChild($author, $updateVenda);


        /*$admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateVenda);
        $auth->addChild($admin, $author);*/


        //delete venda
        /*$author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $deleteVenda);


        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $deleteVenda);
        $auth->addChild($admin, $author);*/

        // criar Tipo Alimento

        $auth->addChild($admin, $createTipoAlimento);

        /*$admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createTipoAlimento);
        $auth->addChild($admin, $author);*/

        //read tipo alimento

        $auth->addChild($author, $readTipoAlimento);


        $auth->addChild($admin, $readTipoAlimento);


//update tipo alimento

        $auth->addChild($author, $updateTipoAlimento);


        /*$admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateTipoAlimento);
        $auth->addChild($admin, $author);*/


        //delete tipo alimento
       /* $author = $auth->createRole('admin');
        $auth->add($author);
        $auth->addChild($author, $deleteTipoAlimento);*/


        /*$admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $deleteTipoAlimento);
        $auth->addChild($admin, $author);*/

       // $auth->assign($author, 2);
        //$auth->assign($admin, 1);

    }

    public function down()
    {
        $auth= Yii::$app->authManager;
        $auth->removeAll();

    }

}
