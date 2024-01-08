<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model {
  use HasFactory;
  public $fillable = ['name',  'color', 'sound', 'type'];

  public function getColor() : string {
    return $this->color;
  }

  public function isGuard() : bool {
    return false;
  }

  public function isLitterTrained() : bool {
    return false;
  }
}
