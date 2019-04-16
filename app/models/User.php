<?php

namespace App\Models;
use App\Core\App;

class User
{

  protected $username;
  protected $email;
  protected $password;
  protected $passwordConfirmation;


  //TODO: Napravi ovo bolje malo.
  public function __construct($data)
  {
    if(isset($data['username'])){
      $this->username = $data['username'];
    }
    if(isset($data['email'])){
      $this->email = $data['email'];
    }
    if(isset($data['password'])){
      $this->password = $data['password'];
    }
    if(isset($data['confirm'])){
      $this->passwordConfirmation = $data['confirm'];
    }

  }

  public function register()
  {
    $result = [];
    
    if($this->checkErrors($result)){
      return $result;
    }

    $password = password_hash($this->password, PASSWORD_DEFAULT);

    App::get('database')->insert('users',[
      'username' => $this->username,
      'email' => $this->email,
      'password' => $password
    ]);

    $result['username'] = $this->username;
    $result['email'] = $this->email;

    return $result;

  }

  public function signin()
  {
    $result = [];

    if(!$this->exists('email')){
      $result['email'] = 'There is no user with this email';
      $result['error'] = true;
      return $result;
    }

    $sql = "select password from users where email=:email";
    $param['email'] = $this->email;
    $hash = App::get('database')->selectPassword($sql,$this->email)['password'];

    $valid = password_verify($this->password, $hash);
    if($valid){
      if(password_needs_rehash($hash, PASSWORD_DEFAULT)){
        $newHash = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = "update users set password = :password where email=:email";
        $param['password'] = $newHash;
        $param['email'] = $this->email;
        App::get('database')->update($sql, $param);
      }
      
    }
    else{
      $result['password'] = "The username/password combo is invalid";
      $result['error'] = true;
    }

    return $result;
  }

  private function checkErrors(&$result)
  {
    if($this->exists('email')){
      $result['email'] = 'There is already an user with this email.';
      $result['error'] = true;
    }

    if($this->exists('username')){
      $result['username'] = 'This username is taken. Please choose another one.';
      $result['error'] = true;
    }

    if(!$this->checkPassword($this->password, $result)){
      $result['error'] = true;
    }

    if($this->password != $this->passwordConfirmation){
      $result['confirm'] = 'Passwords do not match';
      $result['error'] = true;
    }

    return (!empty($result['error']));
  }

  private function exists($data)
  {
    $sql = "select * from users where {$data}=:{$data}";
    $param = [$data => $this->$data];
    $result = App::get('database')->select($sql,$param);

    if(count($result) > 0){
      return true;
    }
    return false;
  }

  private function checkPassword($password, &$result)
  {
    $errors_init = $result;
    if (strlen($password) < 8) {
      $result['password'] = "Password too short!";
    }

    if (!preg_match("#[0-9]+#", $password)) {
        $result['password'] .= " Password must include at least one number!";
    }

    if (!preg_match("#[a-zA-Z]+#", $password)) {
        $result['password'] .= " Password must include at least one letter!";
    }
    return ($result == $errors_init);
  }
}