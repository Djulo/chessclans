<?php

namespace App\Controllers;
use App\Core\App;
use App\Models\User;

require '../app/helpers.php';

class UsersController
{

  public function signup()
  {
    $user = new User($_POST);
    $result = $user->register();

    if(empty($result['error'])){
      return view('signin', compact('result'));
    }
    return view('signup', compact('result'));
  }

  public function signin()
  {
    $user = new User($_POST);
    $result = $user->signin();
    if(empty($result['error'])){
      redirect('');
    }
    return view('signin', compact('result'));
  }
}
