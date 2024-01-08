<?php
namespace App\Libraries;

use App\Models\Animal;
use App\Models\Cat;
use App\Models\Dog;

class AnimalFactory {
  public static function all() {
    $animals = Animal::all();
    return $animals->map(function ($a) {return self::find($a->id);});
  }

  public static function find($id) {
    $a = Animal::findOrFail($id);
    if ($a) {
      if ('Cat' == $a->type) {return Cat::find($id);}
      if ('Dog' == $a->type) {return Dog::find($id);}
      return $a;
    }
  }
}
