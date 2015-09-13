<?php

namespace backend\controllers;

use Yii;
use backend\models\MEmp;
use backend\models\MEmpSearch;
use backend\models\MUser;
use backend\models\MUserSearch;
use yii\base\Model;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MEmpController implements the CRUD actions for MEmp model.
 */
class MEmpController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all MEmp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MEmpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MEmp model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      $model = $this->findModel($id);
      $modelUser = $this->findModelUser($model->user_id);
        return $this->render('view', [
            'model' => $model,
            'modelUser'=> $modelUser
        ]);
    }

    /**
     * Creates a new MEmp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MEmp();
        $modelUser = new MUser();

        if (
        $model->load(Yii::$app->request->post()) &&
        $modelUser->load(Yii::$app->request->post()) &&
        Model::validateMultiple([$model,$modelUser])
        ) {
          $transaction = $modelUser::getDb()->beginTransaction();
          try {
            if($modelUser->save()){
              $model->user_id = $modelUser->id;
              $model->save();
            }
             $transaction->commit();
          } catch (\Exception $e) {
             $transaction->rollBack();
          }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelUser'=>$modelUser
            ]);
        }
    }

    /**
     * Updates an existing MEmp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUser = $this->findModelUser($model->user_id);

        if (
        $model->load(Yii::$app->request->post()) &&
        $modelUser->load(Yii::$app->request->post()) &&
        Model::validateMultiple([$model,$modelUser])
        ) {
            if($modelUser->save()){
              $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
              'model' => $model,
              'modelUser'=>$modelUser
            ]);
        }
    }

    /**
     * Deletes an existing MEmp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MEmp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MEmp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MEmp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModelUser($id)
    {
        if (($model = MUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
