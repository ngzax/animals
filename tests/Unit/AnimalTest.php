<?php

namespace Tests\Unit;

use App\Libraries\AnimalFactory;
use App\Models\Animal;

use Tests\TestCase;

class AnimalTest extends TestCase {
  public function testColor(): void {
    // Cat
    $a = Animal::find(2);
    $this->assertEquals('black', $a->color);

    // Dog
    $a = Animal::find(3);
    $this->assertEquals('brown', $a->color);
  }

  public function testLitter(): void {
    // Cat
    $a = AnimalFactory::make(2);
    $this->assertTrue($a->isLitterTrained());

    // Dog
    $a = AnimalFactory::make(3);
    $this->assertFalse($a->isLitterTrained());
  }
}
