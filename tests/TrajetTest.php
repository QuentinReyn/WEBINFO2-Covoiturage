<?php


namespace App\Tests;


use App\Entity\Trajet;
use PHPUnit\Framework\TestCase;

class TrajetTest extends TestCase
{
    protected $trajet;
    public function setUp() :void {
        $this->trajet = new Trajet();
    }
    public function testTrajet(){
        $this->assertInstanceOf(Trajet::class,$this->trajet);
        $this->assertNull($this->trajet->getId());
    }

    public function testTrajetPlaces(){
        $this->trajet->setPlaces(2);
        $this->assertEquals(2,$this->trajet->getPlaces());
    }

}