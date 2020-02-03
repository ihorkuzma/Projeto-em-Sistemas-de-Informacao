<?php

namespace frontend\controllers;

use frontend\models\Alimento;
use frontend\models\Vendas;
use phpDocumentor\Reflection\DocBlock\Tags\Example;
use Yii;
use frontend\models\Linhavenda;
use frontend\models\LinhavendaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinhavendaController implements the CRUD actions for Linhavenda model.
 */
class LinhavendaController extends Controller
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
     * Lists all Linhavenda models.
     * @return mixed
     */
    public function actionIndex($id)
    {   $searchModel = new LinhavendaSearch(['id_venda' => $id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       $linhasVenda= Linhavenda::findAll(['id_venda'=> $id]);
       return $this->render('index', ['linhasVenda' => $linhasVenda, 'dataProvider' => $dataProvider]);

       /* $searchModel = new LinhavendaSearch(['id_venda' => $id]);



        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }

    /**
     * Displays a single Linhavenda model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model= $this->findModel($id);
        $linhavenda= Linhavenda::find(['Cliente_id' => Yii::$app->user->getId()])
            ->all();



        return $this->render('view', [
            'linhavenda' => $linhavenda, 'model'=> $model
        ]);

        /*return $this->render('view', [
            'model' => $this->findModel($id),*/


    }

    /**
     * Creates a new Linhavenda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Linhavenda();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Linhavenda model.
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
     * Deletes an existing Linhavenda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $idvenda)
    {


        $this->findModel($id)->delete();

        return $this->redirect(['index' , 'id'=> $idvenda]);
    }

    /**
     * Finds the Linhavenda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Linhavenda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Linhavenda::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionVendareserva(){
        $venda= new Vendas();
        $venda->id;
        $venda->Cliente_id= Yii::$app->user->identity->getId();
        $venda->tipoVenda=2;
        $venda->id_mesa=0;


    }
}
