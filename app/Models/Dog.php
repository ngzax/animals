<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Animal {
  public $fillable = ['is_guard'];
  protected $table = 'dog';
  public $timestamps = false;

  public function isGuard() : bool {
    return $this->is_guard;
  }
}


