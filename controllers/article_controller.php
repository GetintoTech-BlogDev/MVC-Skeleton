<?php

class ArticleController {

    public function readArticle() {
        require_once('models/comment.php');
        require_once('models/map.php');

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['article_id'])) {  // without an id we just redirect to the error page as we need the post id to find it in the database
                return call('pages', 'error');
            }
        } else {
            Comment::newComment($_GET['article_id']);
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
        try {
// we use article_id to get the correct article and comments to it
            $article = Article::findArticle($_GET['article_id']);
            $comments = Comment::articleComments($_GET['article_id']);
            $map = Map::coordinates($_GET['article_id']);
            require_once('views/articles/readArticle.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function createArticle() {
// we expect a url of form ?controller=product&action=create
// if it's a GET request display a blank form for creating a new product
// else it's a POST so add to the database and redirect to readAll action      
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once('views/articles/createArticle.php');
            } else {
                Article::addArticle();
                header("Location: index.php");
                exit();

                $articles = Article::all();
                require_once('views/articles/readAll.php');
            }
        } catch (Exception $ex) {
            return call('pages', 'error');

        }
    }
    

    public function readAll() {
        try {
            $articles = Article::all();
            require_once('views/articles/readAll.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function read() {
        if (!isset($_GET['article_id']))
            return call('pages', 'error');

        try {
// we use the given id to get the correct post
            $article = Article::find($_GET['article_id']);
            require_once('views/articles/read.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function create() {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once('views/articles/create.php');
            } else {
                Article::add();
                $articles = Article::all();
                require_once('views/articles/readAll.php');
            }
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['article_id'])){
            return call('pages', 'error');}
            // we use the given id to get the correct product
            require_once('models/comment.php');
            $article = Article::find($_GET['article_id']);
            $comment = Comment::allArticleComments($_GET['article_id']);
            require_once('views/articles/update.php');
        }
        else {
            $id = $_GET['article_id'];
            Article::update($id);
            $articles = Article::all();
            require_once('views/articles/readAll.php');
        }
    }

    public function delete() {

        try {
            Article::remove($_GET['article_id']);
            $articles = Article::all();
            require_once('views/articles/readAll.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }
    
    public function deleteComment() {
            Article::removeComment($_GET['comment_id']);
            
            // we use the given id to get the correct product
            require_once('models/comment.php');
            $article = Article::find($_GET['article_id']);
            //$comment = Comment::allArticleComments($_GET['article_id']); - this method if form all status of comments Approved, rej and Pending
            $comment = Comment::allArticleComments($_GET['article_id']);
            require_once('views/articles/update.php');
      }

    public function readcategory() {
        try {
            $articles = Article::allcategory();
            require_once('views/articles/readcategory.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function searchAll() {
        try {
            $list = Article::searchAll($_GET['search']);
            $keyword = ($_GET['search']);
            require_once __DIR__ . '/../views/articles/search.php';
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

}

?>