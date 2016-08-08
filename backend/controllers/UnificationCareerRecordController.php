<?php

namespace backend\controllers;

use Yii;
use common\models\UnificationCareerRecord;
use common\models\Organisation;
use common\models\AppUser;
use backend\models\UnificationCareerRecordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnificationCareerRecordController implements the CRUD actions for UnificationCareerRecord model.
 */
class UnificationCareerRecordController extends Controller
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
     * Lists all UnificationCareerRecord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UnificationCareerRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UnificationCareerRecord model.
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
     * Creates a new UnificationCareerRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UnificationCareerRecord();

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
				'organisations'=>Organisation::getOrganisations(true),
				'user_id' => Yii::$app->request->post('user_id'),
				]);
			} 
			
            return $this->render('create', [
                'model' => $model,
                'organisations'=>Organisation::getOrganisations(true),
				'users' => AppUser::getUsers(),
            ]);
        }
    }

    /**
     * Updates an existing UnificationCareerRecord model.
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
            return $this->render('update', [
                'model' => $model,
				'users' => AppUser::getUsers(),
            ]);
        }
    }

    /**
     * Deletes an existing UnificationCareerRecord model.
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
     * Finds the UnificationCareerRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UnificationCareerRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UnificationCareerRecord::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
