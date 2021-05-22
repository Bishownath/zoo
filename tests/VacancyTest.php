<?php
require "testfunctions/Vacancy_Test_Functions.php";

class VacancyTest extends \PHPUnit_Framework_TestCase
{
    function testEmptyFullname()
    {
        $testObject = new Vacancy_Test_Functions();
        $data = [
            'fullname' => '',
            'address' => 'Baudha',
            'contact' => '1234',
            'type' => 'permanent',
            'starting_date' => '02-02-2020',
            'ending_date' => '02-02-2030'

        ];
        $boolean = $testObject->test_vacancy($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyaddress()
    {
        $testObject = new Vacancy_Test_Functions();
        $data = [
            'fullname' => 'Soobash Dhakal',
            'address' => '',
            'contact' => '1234',
            'type' => 'permanent',
            'starting_date' => '02-02-2020',
            'ending_date' => '02-02-2030'

        ];
        $boolean = $testObject->test_vacancy($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyContact()
    {
        $testObject = new Vacancy_Test_Functions();
        $data = [
            'fullname' => 'Soobash Dhakal',
            'address' => 'Baudha',
            'contact' => '',
            'type' => 'permanent',
            'starting_date' => '02-02-2020',
            'ending_date' => '02-02-2030'

        ];
        $boolean = $testObject->test_vacancy($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyType()
    {
        $testObject = new Vacancy_Test_Functions();
        $data = [
            'fullname' => 'Soobash Dhakal',
            'address' => 'Baudha',
            'contact' => '1234',
            'type' => '',
            'starting_date' => '02-02-2020',
            'ending_date' => '02-02-2030'

        ];
        $boolean = $testObject->test_vacancy($data);
        $this->assertTrue($boolean);
    }
    
    function testEmptyStartingDate()
    {
        $testObject = new Vacancy_Test_Functions();
        $data = [
            'fullname' => 'Soobash Dhakal',
            'address' => 'Baudha',
            'contact' => '1234',
            'type' => 'permanent',
            'starting_date' => '',
            'ending_date' => '02-02-2030'

        ];
        $boolean = $testObject->test_vacancy($data);
        $this->assertTrue($boolean);
    }

     function testEmptyEndingDate()
    {
        $testObject = new Vacancy_Test_Functions();
        $data = [
            'fullname' => 'Soobash Dhakal',
            'address' => 'Baudha',
            'contact' => '1234',
            'type' => 'permanent',
            'starting_date' => '02-02-2020',
            'ending_date' => ''

        ];
        $boolean = $testObject->test_vacancy($data);
        $this->assertTrue($boolean);
    }
}
