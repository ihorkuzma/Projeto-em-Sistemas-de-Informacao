<?php

namespace frontend\controllers;

use common\fixtures\UserFixture;
use common\widgets\Alert;
use frontend\models\Cliente;
use frontend\models\LinhaVenda;
use Symfony\Component\Console\Tests\Output\NullOutputTest;
use Yii;
use frontend\models\Vendas;
use frontend\models\Alimento;
use frontend\models\AlimentoSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\View;
use yii\validators\ExistValidator;
/**
 * AlimentoController implements the CRUD actions for Alimento model.
 */
class AlimentoController extends Controller
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
     * Lists all Alimento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $alimentos = Alimento::find() -> all();

        return $this-> render('index',['alimentos' => $alimentos]);

        /*
        $searchModel = new AlimentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }

    /**
     * Displays a single Alimento model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Alimento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Alimento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alimento model.
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
     * Deletes an existing Alimento model.
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
     * Finds the Alimento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Alimento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Alimento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionPedido($idvenda, $idalimento){

        $linhavenda = LinhaVenda::findOne(['id_alimento'=>$idalimento, 'id_venda'=>$idvenda]);

        //ver se prato ja está na venda
       if($linhavenda!=NULL){
           $linhavenda->quantidade = $linhavenda->quantidade + 1;
           $linhavenda->save();

        }else{
           $linhavenda= new LinhaVenda();
           $linhavenda->id_alimento = $idalimento;
           $linhavenda->id_venda= $idvenda;
           $linhavenda->quantidade=1;
           $linhavenda->save();
       }
        $linhavenda->save();

        $this->redirect(['linhavenda/index', 'id' => $idvenda]);
    }




    public function actionIndex2()
    {
        $alimentos = Alimento::find() -> all();

        return $this-> render('index2',['alimentos' => $alimentos, ]);
    }

}
