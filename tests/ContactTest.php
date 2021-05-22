<?php
require "testfunctions/Contact_Test_Functions.php";

class ContactTest extends \PHPUnit_Framework_TestCase
{
    function testEmptyFirstName()
    {
        $testObject = new Contact_Test_Functions();
        $data = [
            'firstname' => '',
            'lastname' => 'Dhakal',
            'phone' => '1234',
            'address' => 'Jorpati',
            'email' => 'soobash@gmail.com'
        ];
        $boolean = $testObject->test_contact($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyLastName()
    {
        $testObject = new Contact_Test_Functions();
        $data = [
            'firstname' => 'Soobash',
            'lastname' => '',
            'phone' => '1234',
            'address' => 'Jorpati',
            'email' => 'soobash@gmail.com'
        ];
        $boolean = $testObject->test_contact($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyPhone()
    {
        $testObject = new Contact_Test_Functions();
        $data = [
            'firstname' => 'Soobash',
            'lastname' => 'Dhakal',
            'phone' => '',
            'address' => 'Jorpati',
            'email' => 'soobash@gmail.com'
        ];
        $boolean = $testObject->test_contact($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyAddress()
    {
        $testObject = new Contact_Test_Functions();
        $data = [
            'firstname' => 'Soobash',
            'lastname' => 'Dhakal',
            'phone' => '1234',
            'address' => '',
            'email' => 'soobash@gmail.com'
        ];
        $boolean = $testObject->test_contact($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyEmail()
    {
        $testObject = new Contact_Test_Functions();
        $data = [
            'firstname' => 'Soobash',
            'lastname' => 'Dhakal',
            'phone' => '1234',
            'address' => 'Jorpati',
            'email' => ''
        ];
        $boolean = $testObject->test_contact($data);
        $this->assertTrue($boolean);
    }
}
