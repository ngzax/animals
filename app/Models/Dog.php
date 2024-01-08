<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Animal {
  protected $table      = 'dog';
  public    $timestamps = false;

  public function getFillable() : array {
    return array_merge(parent::getFillable(), ['is_guard']);
  }

  public function isGuard() : bool {
    return $this->is_guard;
  }
}


