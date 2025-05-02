<?php
$players = array("Virat Kohli", "Rohit Sharma", "MS Dhoni", "Jasprit Bumrah", "KL Rahul");

echo "<table border='1' cellpadding='5'>
<tr><th>Indian Cricket Players</th></tr>";

foreach ($players as $player) {
    echo "<tr><td>$player</td></tr>";
}

echo "</table>";
?>
