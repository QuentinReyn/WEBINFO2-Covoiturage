<?php


namespace App\Tests;


use App\Entity\Lieu;
use App\Entity\Trajet;
use App\Entity\User;
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

    public function testTrajetDatetime(){
        $date = new \DateTime();
        $this->trajet->setDatetime($date);
        $this->assertEquals($date,$this->trajet->getDatetime());
    }

    public function testLieuDepart(){
        $lieu = new Lieu();
        $this->trajet->setLieuDepart($lieu);
        $lieu->addTrajetsdepart($this->trajet);
        $this->assertEquals($lieu,$this->trajet->getLieuDepart());
        $this->assertContains($this->trajet,$lieu->getTrajetsdepart());
    }

    public function testLieuArrivee(){
        $lieu = new Lieu();
        $this->trajet->setLieuArrivee($lieu);
        $lieu->addTrajetsArrivee($this->trajet);
        $this->assertEquals($lieu,$this->trajet->getLieuArrivee());
        $this->assertContains($this->trajet,$lieu->getTrajetsarrivee());
    }

    public function testTrajetConducteur(){
        $user = new User();
        $this->trajet->setConducteur($user);
        $user->addConducteurtrajet($this->trajet);
        $this->assertEquals($user,$this->trajet->getConducteur());
        $this->assertContains($this->trajet,$user->getConducteurtrajets());
    }
}