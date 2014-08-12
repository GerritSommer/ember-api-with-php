<?php

class UsersController {

  public function index() {
    $users = User::find('all');
    $json = User::array_to_json($users);
    return $json;
  }

  public function show($id) {
    $user = User::find(1);
    $json = $user->to_json();
    return $json;
  }

  public function create($params) {
    $user = User::create($params);
    $root =  ActiveRecord\Utils::singularize(User::table_name());
    $json = json_encode(array($root => $user->to_array()));
    return $json;
  }

  public function update($id, $params) {
    $user = User::find($id);
    $user->update_attributes($params);
    $updated_user = User::find($id);
    $json = $updated_user->to_json();
    return $json;
  }

  public function delete($id) {
    $user = User::find($id);
    $user->delete();
    return true;
  }
}

?>