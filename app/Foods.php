<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
  const CREATED_AT = "create_time";
	const UPDATED_AT = "update_time";
  public $timestamps = false;

}
