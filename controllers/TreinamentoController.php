<?php

namespace app\controllers;

use Yii;
use app\models\TreinamentoModel;
use app\models\TreinamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * TreinamentoController implements the CRUD actions for TreinamentoModel model.
 */
class TreinamentoController extends Controller
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
     * Lists all TreinamentoModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TreinamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TreinamentoModel model.
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
     * Creates a new TreinamentoModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TreinamentoModel();
 
        
        
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $arquivo = $model->nome;
            $model->file = UploadedFile::getInstance($model,'file');
             if($model->file!=null){
                $model ->file->saveAs('repositorioTreinamento/'.$arquivo.'.'.$model->file->extension);
                $model->url = 'repositorioTreinamento/'.$arquivo.'.'.$model->file->extension;
             }
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TreinamentoModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $arquivo = $model->nome;
            $model->file = UploadedFile::getInstance($model,'file');
             if($model->file!=null){
                $model ->file->saveAs('repositorioTreinamento/'.$arquivo.'.'.$model->file->extension);
                $model->url = 'repositorioTreinamento/'.$arquivo.'.'.$model->file->extension;
             }$model->save();
            return $this->redirect(['view', 'id' => $model->idTreinamento]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TreinamentoModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDownload($id){    
    
            $model = $this->findModel($id);
          
            $local = Yii::getAlias('@webroot') . '/repositorioTreinamento/';
            $nome = ''.$model->file ;
    
    $arquivo = $local.$nome ;
            
           if (file_exists($arquivo)) {

           Yii::$app->response->sendFile($arquivo);

          } else{
                throw new \yii\web\NotFoundHttpException('Arquivo não encontrado. '.$nome);
           }
        
        
    
 }
    
    /**
     * Finds the TreinamentoModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TreinamentoModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TreinamentoModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
