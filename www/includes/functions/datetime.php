<?php
/**
 * @desc   Helper function used to return a unique string based on timestamp
 *         useful for naming files.
 */

function returnTimestamp()
{
    $currentTime = microtime();
    $timeArray = explode(" ", $currentTime);
    $newTimestamp = (float)$timeArray[1] + (float)$timeArray[0];

    return $newTimestamp;
}


function returnDateTimestamp()
{
    // MySQL retrieves and displays DATETIME values in 'YYYY-MM-DD HH:MM:SS' format.
    date_default_timezone_set('America/New_York');
    // $currentDateTime = date('m/d/Y h:i:s a', time());
    $currentDateTime = date('Y-m-d h:i:s a', time());
    return $currentDateTime;
}
