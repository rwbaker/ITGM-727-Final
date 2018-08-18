<?php

// CREATE Migraine

//Friendly reusable error
function fail($err = "")
{
    $err = $err ?: "";
    echo "Something went wrong. Please try again later. " . $err;
}

function createMigraine($user_id, $data_start, $data_end, $data_severity, $data_location, $data_weather, $data_remedy, $data_notes)
{

    // @TODO do time math
    $data_duration = "";

    // Standard & reusable db connection
    require_once "../includes/helpers/config.php";

    $sql = "INSERT INTO migraine (user_id, start_time, end_time, severity, location, weather, remedy, notes, duration) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare an insert statement
    $stmt = mysqli_prepare($link, $sql);

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "issssssss", $user_id, $data_start, $data_end, $data_severity, $data_location, $data_weather, $data_remedy, $data_notes, $data_duration);

    /* execute prepared statement */
    mysqli_stmt_execute($stmt);
    // printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));
    // @TODO Success Message

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} //end function
