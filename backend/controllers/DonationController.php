<?php

namespace backend\controllers;

use Yii;
use common\models\Donation;
use common\models\AppUser;
use common\models\DonationType;
use backend\models\DonationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DonationController implements the CRUD actions for Donation model.
 */
class DonationController extends Controller
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
     * Lists all Donation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donation model.
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
     * Creates a new Donation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Donation();

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
				/*
                 * passes an array of donation types and users
                 * */
                'donation_types'=> DonationType::getDonationTypes(true),
				'user_id' => Yii::$app->request->post('user_id'),
				]);
			} 
			
            return $this->render('create', [
                'model' => $model,
                /*
                 * passes an array of donation types and users
                 * */
                'donation_types'=> DonationType::getDonationTypes(true),
				'users' => AppUser::getUsers(),
            ]);
        }
    }

    /**
     * Updates an existing Donation model.
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
				'donation_types'=> DonationType::getDonationTypes(true),
				
				]);
			}
			
            return $this->render('update', [
                'model' => $model,
				  /*
                 * passes an array of donation types and users
                 * */
                'donation_types'=> DonationType::getDonationTypes(true),
				'users' => AppUser::getUsers(),
            ]);
        }
    }

    /**
     * Deletes an existing Donation model.
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
     * Finds the Donation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Donation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
