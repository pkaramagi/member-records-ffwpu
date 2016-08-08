<?php

namespace backend\controllers;

use Yii;
use common\models\AppUser;
use common\models\BlessingGroup;
use common\models\Religion;
use common\models\Generation;
use backend\models\AppUserSearch;
use backend\models\UploadFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AppUserController implements the CRUD actions for AppUser model.
 */
class AppUserController extends Controller
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
     * Lists all AppUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppUser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModelData($id),
        ]);
    }

    /**
     * Creates a new AppUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new AppUser();
		
        if ($model->load(Yii::$app->request->post())) {
			// get the uploaded file instance. for multiple file uploads
			// the following data will return an array
			$model->imageFile = UploadedFile::getInstance($model, 'picture');
			print_r($model->imageFile);
			//get file extension
			$ext = $model->imageFile->extension;
			
			// generate a unique file name
			$filename = Yii::$app->security->generateRandomString().".{$ext}";
            $model->picture = $filename;
			
			//upload folder path
			//$imagePath = Yii::getAlias("@webroot").'/uploads';   
			
			//$miagePath = $imagePath.$model->picture;
			
			if($model->save()){
				//$image->saveAs($imagePath);
				$model->upload($filename);
				return $this->redirect(['view', 'id'=>$model->id]);
			}
			
			
            
        } else {
			
            return $this->render('create', [
                'model' => $model,
                /*
                *  blessing-group, religions, generation arrays for  auto complete
                 * */
                'blessing_groups'=>BlessingGroup::getBlessingGroups(true),
                'religions'=>Religion::getReligions(true),
                'generations'=> Generation::getGenerations(true),
            ]);
        }
    }

    /**
     * Updates an existing AppUser model.
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
				/*
                *  blessing-group, religions, generation arrays for  auto complete
                 * */
                'blessing_groups'=>BlessingGroup::getBlessingGroups(true),
                'religions'=>Religion::getReligions(true),
                'generations'=> Generation::getGenerations(true),
            ]);
        }
    }

    /**
     * Deletes an existing AppUser model.
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
     * Finds the AppUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AppUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	    /**
     * Finds the AppUser model based on its primary key value and its relations.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelData($id)
    {
		$with = ['contacts','addresses','awards','punishments','unificationCareerRecords','generalCareerRecords','certifiedQualifications','qualifications'];
        if (($model = AppUser::find(['id'=>$id])->with($with)->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}
