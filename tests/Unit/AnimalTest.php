<?php

namespace Tests\Unit;

use App\Libraries\AnimalFactory;
use App\Models\Animal;
use App\Models\Cat;
use App\Models\Dog;

use Tests\TestCase;

class AnimalTest extends TestCase {
  public function setUp() : void {
    parent::setUp();
    $a = Dog::find(3);
    $a->update(['color' => 'brown']);
    $a->update(['is_guard' => false]);
  }

  public function testCreation() {
    // Cat
    $a = Cat::find(2);
    $this->assertInstanceOf(Cat::class, $a);

    // Dog
    $a = AnimalFactory::find(3);
    $this->assertInstanceOf(Dog::class, $a);
  }

  public function testColor(): void {
    // Cat
    $a = Cat::find(2);
    $this->assertEquals('black', $a->getColor());

    // Dog
    $a = Dog::find(3);
    $this->assertEquals('brown', $a->color);
  }

  public function testLitter(): void {
    // Cat
    $a = Cat::find(2);
    $this->assertTrue($a->isLitterTrained());

    // Cat (of another color...)
    $a = Cat::find(2);
    $this->assertTrue($a->isLitterTrained());

    $a->is_litter_trained = False;
    $this->assertFalse($a->isLitterTrained());

    // Dog
    $a = Dog::find(3);
    $this->assertFalse($a->isLitterTrained());
  }

  public function testGuard(): void {
    // Cat
    $a = Cat::find(2);
    $this->assertFalse($a->isGuard());

    // Dog
    $a = Dog::find(3);
    $this->assertFalse($a->isGuard());
  }

  public function testUpdate(): void {
    // Dog
    $a = Dog::find(3);
    $this->assertFalse($a->isGuard());

    // Is Guard?
    $a->update(['is_guard' => true]);
    $this->assertTrue($a->isGuard());

    // Color
    $this->assertEquals('brown', $a->color);
    $a->update(['color' => 'parti']);
    $this->assertEquals('parti', $a->color);

    // reset it back to default.
    $a->update(['color' => 'brown']);
  }
}
