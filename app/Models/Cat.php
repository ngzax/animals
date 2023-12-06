<?php

namespace App\Models;

use App\Models\Animal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Animal {
  protected $table = 'cat';

  public function isLitterTrained() : bool {
    return $this->is_litter_trained;
  }
}


