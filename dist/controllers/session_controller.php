<?php
class SessionController {

  public function logout(){
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    Helper::routRedirect('index',array('route'=>'home','method'=>'index'));
  }

  public function validate($post) {
    if(isset($post['name']) and isset($post['password'])) {
      $username = $post['name'];
      $password = $post['password'];
      $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
      $sql = 'SELECT id, name, password FROM users WHERE name="'. $mysqli->real_escape_string($username) .'"';
      $result = $mysqli->query($sql);
      $row = $result->fetch_assoc();

      if($row['password'] === $password) {
        return User::find($row['id']);
      }
    } else {
      return false;
    }
  }
}


?>