<?php

class ArticlesController {

  public function index() {
    $articles = Article::find('all');
    $json = Article::array_to_json($articles);
    return $json;
  }

  public function show($id) {
    $article = Article::find(1);
    $json = $article->to_json();
    return $json;
  }

  public function create($params) {
    $article = Article::create($params);
    $root =  ActiveRecord\Utils::singularize(Article::table_name());
    $json = json_encode(array($root => $article->to_array()));
    return $json;
  }

  public function update($id, $params) {
    $article = Article::find($id);
    $article->update_attributes($params);
    $updated_article = Article::find($id);
    $json = $updated_article->to_json();
    return $json;
  }

  public function delete($id) {
    $article = Article::find($id);
    $article->delete();
    return true;
  }
}

?>