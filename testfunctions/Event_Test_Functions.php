<?php

class Event_Test_Functions
{
    function test_event($data)
    {
        $boolean = false;
        if ($data['title'] == "")
            $boolean = true;
        if ($data['description'] == "")
            $boolean = true;
        if ($data['duration'] == "")
            $boolean = true;
        if ($data['dates'] == "")
            $boolean = true;
        if ($data['image'] == "")
            $boolean = true;
        return $boolean;
    }
}
