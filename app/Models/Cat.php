<?php

namespace App\Models;

use App\Models\Animal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Animal {
  public $fillable = ['is_litter_trained'];
  protected $table = 'cat';
  public $timestamps = false;

  public function isLitterTrained() : bool {
    return $this->is_litter_trained;
  }
}


