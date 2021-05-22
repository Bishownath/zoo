<?php
require "testfunctions/Event_Test_Functions.php";

class EventTest extends \PHPUnit_Framework_TestCase
{
    function testEmptyTitle()
    {
        $testObject = new Event_Test_Functions();
        $data = [
            'title' => '',
            'description' => 'Dhakal',
            'duration' => '1234',
            'dates' => 'Jorpati',
            'image' => 'soobash@gmail.com'
        ];
        $boolean = $testObject->test_event($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyDescription()
    {
        $testObject = new Event_Test_Functions();
        $data = [
            'title' => 'Soobash',
            'description' => '',
            'duration' => '1234',
            'dates' => 'Jorpati',
            'image' => 'soobash@gmail.com'
        ];
        $boolean = $testObject->test_event($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyDuration()
    {
        $testObject = new Event_Test_Functions();
        $data = [
            'title' => 'Soobash',
            'description' => 'Dhakal',
            'duration' => '',
            'dates' => 'Jorpati',
            'image' => 'soobash@gmail.com'
        ];
        $boolean = $testObject->test_event($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyDates()
    {
        $testObject = new Event_Test_Functions();
        $data = [
            'title' => 'Soobash',
            'description' => 'Dhakal',
            'duration' => '1234',
            'dates' => '',
            'image' => 'soobash@gmail.com'
        ];
        $boolean = $testObject->test_event($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyImage()
    {
        $testObject = new Event_Test_Functions();
        $data = [
            'title' => 'Soobash',
            'description' => 'Dhakal',
            'duration' => '1234',
            'dates' => 'Jorpati',
            'image' => ''
        ];
        $boolean = $testObject->test_event($data);
        $this->assertTrue($boolean);
    }
}
