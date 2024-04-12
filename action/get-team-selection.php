<?php
// include the connection
require_once '../settings/connection.php';

// create a function that returns result of the SELECT query
function get_team_selection() {
    // write the SELECT all chores query
    $sql = "SELECT * FROM user_selections";

    // execute the query using the connection
    global $conn;
    $result = $conn->query($sql);

    // check if execution worked
    if ($result) {
        // check if any record was returned
        if ($result->num_rows > 0) {
            // fetch records if above is successful and assign to variable
            $selection = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // return an empty array if no records were found
            $selection = [];
        }
        return $selection;
    } else {
        // return false if the query execution failed
        $selection = false;
    }
}
?>
<?php

// write a SELECT query on the "family_name" table
$sql = "SELECT * FROM user_selections";

// execute the query using the connection
$result = mysqli_query($conn, $sql);

// check if execution worked
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

// fetch the results
$selection = [];
while ($row = mysqli_fetch_assoc($result)) {
  $selections[] = $row;
}

// build the family role dropdown on the register_view page
$dropdown = '<select name="id">';
foreach ($selection as $player) {
  $dropdown .= '<option value="' . $selection['id'] . '">' . $selection['player_name'] . '</option>';
}
$dropdown .= '</select>';