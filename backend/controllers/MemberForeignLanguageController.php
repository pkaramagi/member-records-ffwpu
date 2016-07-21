<?php

namespace backend\controllers;

use Yii;
use common\models\MemberForeignLanguage;
use backend\models\MemberForeignLanguageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MemberForeignLanguageController implements the CRUD actions for MemberForeignLanguage model.
 */
class MemberForeignLanguageController extends Controller
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
     * Lists all MemberForeignLanguage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemberForeignLanguageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MemberForeignLanguage model.
     * @param integer $user_id
     * @param integer $foreign_langauge_id
     * @return mixed
     */
    public function actionView($user_id, $foreign_langauge_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id, $foreign_langauge_id),
        ]);
    }

    /**
     * Creates a new MemberForeignLanguage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MemberForeignLanguage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'foreign_langauge_id' => $model->foreign_langauge_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MemberForeignLanguage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_id
     * @param integer $foreign_langauge_id
     * @return mixed
     */
    public function actionUpdate($user_id, $foreign_langauge_id)
    {
        $model = $this->findModel($user_id, $foreign_langauge_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'foreign_langauge_id' => $model->foreign_langauge_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MemberForeignLanguage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_id
     * @param integer $foreign_langauge_id
     * @return mixed
     */
    public function actionDelete($user_id, $foreign_langauge_id)
    {
        $this->findModel($user_id, $foreign_langauge_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MemberForeignLanguage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_id
     * @param integer $foreign_langauge_id
     * @return MemberForeignLanguage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id, $foreign_langauge_id)
    {
        if (($model = MemberForeignLanguage::findOne(['user_id' => $user_id, 'foreign_langauge_id' => $foreign_langauge_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
