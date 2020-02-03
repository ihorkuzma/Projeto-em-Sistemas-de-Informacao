<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Vendas;
use frontend\models\VendasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VendasController implements the CRUD actions for Vendas model.
 */
class VendasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Vendas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vendas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $idvenda=Vendas::findOne(['Cliente_id' => Yii::$app->user->getId()]);



        return $this->render('view', [
            'idvenda' =>$idvenda
        ]);
    }

    /**
     * Creates a new Vendas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tipovenda)
    {
        $venda = new Vendas();
        $venda->Cliente_id = Yii::$app->user->identity->id;
        $venda->Tipo_venda_id = $tipovenda;

        if ($tipovenda==1){
            $venda->id_mesa=0;
            $venda ->save();
            $this->redirect(['linhavenda/index', 'id' => $venda->id]);
        }else{
            $venda->id_mesa=2;
            $venda ->save();
            $this->redirect(['reserva\create', 'id' => $venda->id]);
}



    }

    /**
     * Updates an existing Vendas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vendas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vendas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vendas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vendas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
