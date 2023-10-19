<?php
namespace App\Libraries;

use App\Models\Animal;
use App\Models\Cat;

class AnimalFactory {
  public static function make($id) {
    $a = Animal::findOrFail($id);
    if ($a) {
      if ('Cat' == $a->type) {return Cat::find($id);}
      return $a;
    }
  }
}
