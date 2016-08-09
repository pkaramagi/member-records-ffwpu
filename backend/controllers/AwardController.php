<?php

namespace backend\controllers;

use Yii;
use common\models\Award;
use common\models\AppUser;
use backend\models\AwardSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AwardController implements the CRUD actions for Award model.
 */
class AwardController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Award models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AwardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Award model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Award model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Award();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			if(Yii::$app->request->isAjax){
				return false;
			}
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
			/* check request is an AJAX request */
			if(Yii::$app->request->isAjax){
				
				return $this->renderAjax('create', [
                'model' => $model,
				'ajax' => true, /* Tell the view that ajax is enabled*/
				'user_id' => Yii::$app->request->post('user_id'),
				]);
			} 
			
            return $this->render('create', [
                'model' => $model,
				'users' => AppUser::getUsers(),
            ]);
        }
    }

    /**
     * Updates an existing Award model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
			if(Yii::$app->request->isAjax){
				
				return $this->renderAjax('update', [
                'model' => $model,
				'ajax' => true, /* Tell the view that ajax is enabled*/
				
				]);
			}
			
            return $this->render('update', [
                'model' => $model,
				'users' => AppUser::getUsers(),
            ]);
        }
    }

    /**
     * Deletes an existing Award model.
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
     * Finds the Award model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Award the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Award::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
