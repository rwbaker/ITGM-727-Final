<?php

// CREATE Migraine

//Friendly reusable error
function fail($err = "")
{
    $err = $err ?: "";
    echo "Something went wrong. Please try again later. " . $err;
}

function editMigraine($data_user, $data_migraine, $data_start, $data_end, $data_severity, $data_location, $data_weather, $data_remedy, $data_notes)
{

    // @TODO do time math
    $data_duration = "";

    // Standard & reusable db connection
    include "../includes/helpers/config.php";

    // $sql = "INSERT INTO migraine (user_id, migraine_id, start_time, end_time, severity, location, weather, remedy, notes, duration) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $sql = "UPDATE `migraine` SET `start_time`='$data_start',
      `end_time`='$data_end',`severity`='$data_severity',
      `location`='$data_location',`weather`='$data_weather',
      `remedy`='$data_remedy',`notes`='$data_notes'
      WHERE `migraine_id` = '$data_migraine' and `user_id` = '$data_user'";

    // echo "sql string: " . $sql;

    // if (mysqli_query($link, $sql)) {
    //     echo "Record updated";
    // } else {
    //     echo "Error updating record";
    // }

    $result = mysqli_query($link, $sql);
    if (false===$result) {
        // printf("Error updating record: %s\n", mysqli_error($link));
    } else {
        // echo "Record updated";
    }

    // Prepare an insert statement
    // $stmt = mysqli_prepare($link, $sql);

    // Bind variables to the prepared statement as parameters
    // mysqli_stmt_bind_param($stmt, "iissssssss", $data_user, $data_migraine, $data_start, $data_end, $data_severity, $data_location, $data_weather, $data_remedy, $data_notes, $data_duration);

    /* execute prepared statement */
    // mysqli_stmt_execute($stmt);
    // printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));
    // @TODO Success Message

    // Close statement
    // mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} //end function
