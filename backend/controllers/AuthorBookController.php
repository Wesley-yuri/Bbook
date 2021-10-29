<?php

namespace backend\controllers;

use common\models\AuthorBook;
use backend\models\AuthorBookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthorBookController implements the CRUD actions for AuthorBook model.
 */
class AuthorBookController extends Controller
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
     * Lists all AuthorBook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthorBookSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthorBook model.
     * @param int $author_id Author ID
     * @param int $book_id Book ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($author_id, $book_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($author_id, $book_id),
        ]);
    }

    /**
     * Creates a new AuthorBook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthorBook();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'author_id' => $model->author_id, 'book_id' => $model->book_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AuthorBook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $author_id Author ID
     * @param int $book_id Book ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($author_id, $book_id)
    {
        $model = $this->findModel($author_id, $book_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'author_id' => $model->author_id, 'book_id' => $model->book_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AuthorBook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $author_id Author ID
     * @param int $book_id Book ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($author_id, $book_id)
    {
        $this->findModel($author_id, $book_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthorBook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $author_id Author ID
     * @param int $book_id Book ID
     * @return AuthorBook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($author_id, $book_id)
    {
        if (($model = AuthorBook::findOne(['author_id' => $author_id, 'book_id' => $book_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
