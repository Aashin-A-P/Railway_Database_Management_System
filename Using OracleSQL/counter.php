<?php
// File to store count
$counterFile = "count.txt";

// Check if count file exists
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, 0);
}

// Read current count
$count = file_get_contents($counterFile);

// Increment the count
$count++;

// Write the new count to the file
file_put_contents($counterFile, $count);

// Display the count
echo "<div class='hitcounter'>
        <div class='counterhit'>
            <img src='assets/images/hits3.png' width='30' height='30'>
            <div class='jscountersk'>
                <strong>Site Hits Since 1 January, 2024: $count</strong>
            </div>
        </div>
    </div>";
?>
