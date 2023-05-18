<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCreation()
    {
        // create a new user
        $user = new User();
        $user->setEmail('Test@exemple.com');
        $user->setPassword('password');

        // Verify that the user
        $this->assertEquals('Test@exemple.com', $user->getEmail());
        $this->assertEquals('password', $user->getPassword());
    }
}