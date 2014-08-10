<?php

class UsersController {

  protected $models = array('user');

  public function index() {
    $users = User::find('all');

    $json = json_encode(
      array(User::table_name() =>
        array_map(function($res){
          return $res->to_array();
        }, $users))
    );
    return $json;
  }


  public function show($id) {
    $user = User::find(1);
    $root =  ActiveRecord\Utils::singularize(User::table_name());
    $json = json_encode(array($root => $user->to_array()));

    return $json;
  }

  public function create() {
    if(isset($_POST['name']) and isset($_POST['password']) and isset($_POST['role'])) {
      $user = new User(array('name' => $_POST['name'], 'password' => $_POST['password'], 'role' => $_POST['role']));
      $user->save();
      Helper::routRedirect('index',array('route'=>'users','method'=>'index'));
    }
    return $data;
  }
  public function update() {
    if(isset($_POST['id'])) {
      $user = User::find($_POST['id']);
      $params = $_POST;
      unset($params['id']);
      $user->update_attributes($params);
      $data['user'] = User::find($_POST['id']);
      Helper::routRedirect('index',array('route'=>'users','method'=>'index'));
    } else {
      $data['user'] = User::find($_GET['id']);
    }
    return $data;
  }
  public function delete() {
    if(isset($_GET['id'])) {
      $user = User::find($_GET['id']);
      $user->delete();
      Helper::routRedirect('index',array('route'=>'users','method'=>'index'));
    }
    return $data;
  }
  public function validate() {
    return null;
  }
  public function create_form() {}
}

?>