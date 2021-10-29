<?php

namespace backend\controllers;

use common\models\GenreBook;
use backend\models\GenreBookSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GenreBookController implements the CRUD actions for GenreBook model.
 */
class GenreBookController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all GenreBook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GenreBookSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GenreBook model.
     * @param int $genre_id Genre ID
     * @param int $book_id Book ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($genre_id, $book_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($genre_id, $book_id),
        ]);
    }

    /**
     * Creates a new GenreBook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GenreBook();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'genre_id' => $model->genre_id, 'book_id' => $model->book_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GenreBook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $genre_id Genre ID
     * @param int $book_id Book ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($genre_id, $book_id)
    {
        $model = $this->findModel($genre_id, $book_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'genre_id' => $model->genre_id, 'book_id' => $model->book_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GenreBook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $genre_id Genre ID
     * @param int $book_id Book ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($genre_id, $book_id)
    {
        $this->findModel($genre_id, $book_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GenreBook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $genre_id Genre ID
     * @param int $book_id Book ID
     * @return GenreBook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($genre_id, $book_id)
    {
        if (($model = GenreBook::findOne(['genre_id' => $genre_id, 'book_id' => $book_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
