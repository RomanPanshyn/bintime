<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use app\models\Addresses;
use app\models\AddressesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModelAddresses = new AddressesSearch();
        $dataProviderAddresses = $searchModelAddresses->getUserAddresses($id);

        return $this->render('view', [
            'modelUsers' => $this->findModel($id),
            'searchModelAddresses' => $searchModelAddresses,
            'dataProviderAddresses' => $dataProviderAddresses,
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelUsers = new Users();
        $modelAddresses = new Addresses();
        if ($modelUsers->load(Yii::$app->request->post()) && $modelAddresses->load(Yii::$app->request->post())) {
            $modelUsers->name = ucfirst($modelUsers->name);
            $modelUsers->surname = ucfirst($modelUsers->surname);
            $modelUsers->date = date('Y-m-d H:i:s');
            $modelAddresses->country = strtoupper($modelAddresses->country);
            $modelUsers->save();
            $modelAddresses->user_id = $modelUsers->id;
            $modelAddresses->save();
            return $this->redirect(['view', 'id' => $modelUsers->id]);
        }

        return $this->render('create', [
            'modelUsers' => $modelUsers,
            'modelAddresses' => $modelAddresses,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->name = ucfirst($model->name);
            $model->surname = ucfirst($model->surname);
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
