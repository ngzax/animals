<?php

namespace Tests\Unit;

use App\Models\Animal;

use Tests\TestCase;

class AnimalTest extends TestCase {
  public function test_example(): void {
    $a = Animal::find(2);
    $this->assertEquals('black', $a->color);
  }
}
