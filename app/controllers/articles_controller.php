<?php
class ArticlesController {
  protected $models = array('article', 'user');

  public function index() {
    $articles = Article::all(array('conditions' => array('published = ?', 1)));
    return $articles;
  }

  public function admin_index() {
    $data['articles'] = Article::find('all');
    return $data;
  }

  public function show() {
    $data['article'] = Article::find($_GET['article_id']);
    return $data;
  }

  public function create() {
    if(!empty($_POST)){
      $_POST['date_created'] = time();
      $_POST['published'] === 'on' ? $_POST['published'] = 1 : $_POST['published'] = 0;
      $article = new Article($_POST);
      $article->save();
      Helper::routRedirect('index',array('route'=>'articles','method'=>'admin_index'));
      return $data;
    }
  }

  public function delete() {
    if(isset($_GET['article_id'])) {
      $article = Article::find($_GET['article_id']);
      $article->delete();
      Helper::routRedirect('index',array('route'=>'articles','method'=>'admin_index'));
    }
    Helper::routRedirect('index',array('route'=>'articles','method'=>'admin_index'));
  }

  public function update() {
    if(!empty($_POST)) {
      $params = $_POST;
      $article = Article::find($params['id']);
      unset($params['id']);
      var_dump($params['published']);
      $params['published'] === 'on' ? $params['published'] = 1 : $params['published'] = 0;
      $article->update_attributes($params);
      Helper::routRedirect('index',array('route'=>'articles','method'=>'admin_index'));
    } else {
      $data['article'] = Article::find($_GET['article_id']);
    }
    return $data;
  }
}
?>