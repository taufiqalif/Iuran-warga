<?php

namespace App\Controllers;

class Dasboard extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Dasboard',
    ];
    return view('dasboard/index', $data);
  }
}