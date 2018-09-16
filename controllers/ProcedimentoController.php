<?php

namespace app\controllers;

use Yii;
use app\models\ProcedimentoModel;
use app\models\ProcedimentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ProcedimentoController implements the CRUD actions for ProcedimentoModel model.
 */
class ProcedimentoController extends Controller
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
     * Lists all ProcedimentoModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProcedimentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProcedimentoModel model.
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
     * Creates a new ProcedimentoModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProcedimentoModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
            $model->file = UploadedFile::getInstance($model,'file');
             $arquivo = $model->file;
             if($model->file!=null){
                $model ->file->saveAs('repositorioProcedimento/'.$arquivo.'.'.$model->file->extension);
                $model->url = 'repositorioProcedimento/'.$arquivo.'.'.$model->file->extension;
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
     * Updates an existing ProcedimentoModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $arquivo = $model->titulo;
            $model->file = UploadedFile::getInstance($model,'file');
            
            if($model->file!=null){
                $model ->file->saveAs('repositorioProcedimento/'.$arquivo.'.'.$model->file->extension);
                $model->save();
                $model->url = 'repositorioProcedimento/'.$arquivo.'.'.$model->file->extension;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->idProcedimento]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
public function actionDownload($id){    
    
            $model = $this->findModel($id);
          if($model->file!=null){
            $local = Yii::getAlias('@webroot') . '/repositorioProcedimento/';
            $nome = $model->file ;
            $arquivo = $local.$nome ;
            
           if (file_exists($arquivo)) {

           Yii::$app->response->sendFile($arquivo);

          } else{
                throw new \yii\web\NotFoundHttpException('Arquivo não encontrado. '.$nome);
           }
          }else{
            throw new \yii\web\NotFoundHttpException('Não há arquivos para download');
           }
    
 }
    
    
    /**
     * Deletes an existing ProcedimentoModel model.
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
     * Finds the ProcedimentoModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProcedimentoModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProcedimentoModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
