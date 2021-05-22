<?php

class Vacancy_Test_Functions
{
    function test_vacancy($data)
    {
        $boolean = false;
        if ($data['fullname'] == "")
            $boolean = true;
        if ($data['address'] == "")
            $boolean = true;
        if ($data['contact'] == "")
            $boolean = true;
        if ($data['type'] == "")
            $boolean = true;
        if ($data['starting_date'] == "")
            $boolean = true;
        if ($data['ending_date'] == "")
            $boolean = true;
        return $boolean;
    }
}
