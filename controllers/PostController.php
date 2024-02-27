<?php

namespace app\controllers;

use app\models\Post;

use yii\data\Pagination;
use yii\web\Controller;


class PostController extends Controller
{
    
    public function actionIndex()
    {
        // $posts = Post::find()->all();
        // return $this->render('index', compact('posts'));
        
        /*
        Пример создания поста из кода (демонстрация работы TimestampBehavior)
        $post = new Post();
        $post->category_id = 1;
        $post->title = 'test Post';
        $post->excerpt = '<p>test</p>';
        $post->content = '<p>test</p>';
        $post->img = 'img/post-image9.jpg';
        $post->save();
        */

        $query = Post::find()->with('category');
        $pages = new Pagination([
            'totalCount' => $query->count(), 
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('posts', 'pages'));
    }

    public function actionView($id)
    {
        $postData = Post::findOne($id);
        return $this->render('view', compact('postData'));

    }
}