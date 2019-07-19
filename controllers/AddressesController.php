<?php

namespace app\controllers;

use Yii;
use app\models\Addresses;
use app\models\AddressesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AddressesController implements the CRUD actions for Addresses model.
 */
class AddressesController extends Controller
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
     * Lists all Addresses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AddressesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Addresses model.
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
     * Creates a new Addresses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Addresses();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = $id;
            $model->country = strtoupper($model->country);
            $model->save();

            return $this->redirect(['users/view', 'id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'user_id' => $id,
        ]);
    }

    /**
     * Updates an existing Addresses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->country = strtoupper($model->country);
            $model->save();

            return $this->redirect(['users/view', 'id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Addresses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $user_id = $this->findModel($id)->user_id;
        $searchModelAddresses = new AddressesSearch();
        $countAddresses = $searchModelAddresses->getUserAddresses($user_id)->count;
        if ($countAddresses <= 1) {
            Yii::$app->session->setFlash('error', "You can't delete single address!");
        }
        else {
            $this->findModel($id)->delete();
        }

        return $this->redirect(['users/view', 'id' => $user_id]);
    }

    /**
     * Finds the Addresses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Addresses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Addresses::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
