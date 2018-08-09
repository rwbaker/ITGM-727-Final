<?php
/**
 * @desc   Helper function used to return a unique string based on timestamp
 *         useful for naming files.
 */

function returnTimestamp() {

  $currentTime = microtime();
  $timeArray = explode(" ", $currentTime);
  $newTimestamp = (float)$timeArray[1] + (float)$timeArray[0];

  return $newTimestamp;
}


?>
