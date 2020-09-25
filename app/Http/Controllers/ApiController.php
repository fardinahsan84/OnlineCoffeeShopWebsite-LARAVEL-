<?php

namespace App\Http\Controllers;
use App\Foods;
use Illuminate\Http\Request;

class ApiController extends Controller
{
  function allFood(){
      $food = Foods::all();
      return $food;
    }
}
