<?php

class dateFormat
{
    public function format($originalDate)
    {
        $timestamp = strtotime($originalDate);
        $newDate = date("d-m-Y", $timestamp);

        return $newDate;
    }
}

?>