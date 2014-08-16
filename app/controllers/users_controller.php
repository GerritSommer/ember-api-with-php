<?php

class UsersController {

  public function index() {
    $users = User::find('all');
    $json = User::array_to_json($users);
    return $json;
  }

  public function show($id) {
    try {
      $user = User::find($id);
    } catch (Exception $e) {
      $error = [ 'message' => $e->getMessage() ];
      $e instanceof ActiveRecord\RecordNotFound ? $error['error_code'] = 404 : $error['error_code'] = 400;
    }
    if(isset($error)) {
      return $error;
    } else {
      return $user->to_json();
    }
  }

  public function create($params) {
    try {
      $user = User::create($params);
    } catch (Exception $e) {
      $error = [ 'message' => $e->getMessage(), 'error_code' => 400 ];
    }
    if(isset($error)) {
      return $error;
    } else {
      $root =  ActiveRecord\Utils::singularize(User::table_name());
      $json = json_encode(array($root => $user->to_array()));
      return $json;
    }

  }

  public function update($id, $params) {
    try {
      $user = User::find($id);
      $user->update_attributes($params);
    } catch (Exception $e) {
      $error = [ 'message' => $e->getMessage(), 'error_code' => 400 ];
    }
    if(isset($error)) {
      return $error;
    } else {
     $json = $user->to_json();
     return $json;
   }
 }

  public function delete($id) {
    try {
      $user = User::find($id);
      $user->delete();
    } catch (Exception $e) {
      $error = [ 'message' => $e->getMessage(), 'error_code' => 400 ];
    }
    if(isset($error)) {
      return $error;
    } else {
      return true;
    }
  }
}