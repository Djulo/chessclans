<?php

namespace App\Controllers;
require '../app/helpers.php';

class PagesController
{

  public function index()
  {
    return view('index');
  }

  public function about()
  {
    return view('about');
  }

  public function contact()
  {
    return view('contact');
  }

  public function signin()
  {
    return view('signin');
  }

  public function signup()
  {
    return view('signup');
  }

  public function profile()
  {
    return view('profile');
  }

}