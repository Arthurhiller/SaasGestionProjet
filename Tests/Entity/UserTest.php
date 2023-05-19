<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;


class UserTest extends TestCase
{
    /**
     * Function to test the existence of a user
     *
     * @return void
     */
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

    /**
     * Function to test the existence of a user password with regex pattern
     *
     * @return void
     */
    public function testUserCreationWithPasswordRegex()
    {
        
        // create a new user
        $user = new User();
        $user->setEmail('test@exemple.com');
        $user->setPassword('Password@123');

        $this->assertEquals('test@exemple.com', $user->getEmail());
        $this->assertEquals('Password@123', $user->getPassword());


        $regex = "/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/";
        $this->assertMatchesRegularExpression($regex, $user->getPassword());
    }

    
    public function testUserRoleAttribution()
    {
        // create a new user
        $user = new User();
        $user->setEmail('test@exemple.com');
        $user->setPassword('Password@123');
        $user->setRoles(['ROLE_USER']);

        $this->assertEquals('test@exemple.com', $user->getEmail());
        $this->assertEquals('Password@123', $user->getPassword());

        $this->assertNotEmpty($user->getRoles());
        $this->assertTrue(in_array('ROLE_USER', $user->getRoles()));
    }
}