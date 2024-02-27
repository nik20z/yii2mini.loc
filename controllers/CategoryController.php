<?php

namespace app\controllers;

use app\models\Post;

use yii\data\Pagination;
use yii\web\Controller;


class CategoryController extends Controller
{
    
    public function actionView($alias)
    {
        $query = Post::find()
            ->with('category')
            ->leftJoin('category','category.id = post.category_id')
            ->where(['category.alias' => $alias]);
        $pages = new Pagination([
            'totalCount' => $query->count(), 
            'pageSize' => 2,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('view', compact('posts', 'pages'));
    }
}