<?php

class dateFormat
{
    public function format($originalDate)
    {
        $timestamp = strtotime($originalDate);

        return date("d-m-Y", $timestamp);
    }
}

?>