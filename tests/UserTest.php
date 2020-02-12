<?php


namespace App\Tests;


use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp() : void{
        $this->user = new User();
    }

    public function testNewUser(){
        $this->assertInstanceOf(User::class,$this->user);
        $this->assertNull($this->user->getId());
    }

    public function testUserNom(){
        $this->user->setNom("martin");
        $this->assertEquals("martin",$this->user->getNom());
    }

    public function testUserPrenom(){
        $this->user->setPrenom("philippe");
        $this->assertEquals("philippe",$this->user->getPrenom());
    }

    public function testUserUsername(){
        $this->user->setUsername("pm");
        $this->assertEquals("pm",$this->user->getUsername());
    }

    public function testUserPassword(){
        $this->user->setPassword("abc");
        $this->assertEquals("abc",$this->user->getPassword());
        $this->markTestIncomplete("this test has not been implemented yet");
    }

    public function testUserEmail(){
        $this->user->setEmail("pm@gmail.com");
        $this->assertEquals("pm@gmail.com",$this->user->getEmail());
    }
}