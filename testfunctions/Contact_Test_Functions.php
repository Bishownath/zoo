<?php

class Contact_Test_Functions
{
    function test_contact($data)
    {
        $boolean = false;
        if ($data['firstname'] == "")
            $boolean = true;
        if ($data['lastname'] == "")
            $boolean = true;
        if ($data['phone'] == "")
            $boolean = true;
        if ($data['address'] == "")
            $boolean = true;
        if ($data['email'] == "")
            $boolean = true;
        return $boolean;
    }
}
