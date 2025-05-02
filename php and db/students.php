<?php
$students = array("Asha", "Ravi", "Meera", "John", "Zoya");

echo "<b>Original Array:</b><br>";
print_r($students);

// Sort ascending
asort($students);
echo "<br><br><b>Sorted (A-Z):</b><br>";
print_r($students);

// Sort descending
arsort($students);
echo "<br><br><b>Sorted (Z-A):</b><br>";
print_r($students);
?>
