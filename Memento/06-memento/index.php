<?php
require_once __DIR__ . "/classes.php";

echo "<h2>Memento - Student Profile Undo</h2>";
$profile = new StudentProfile("Juan Dela Cruz", "BSIT", 3, "juan@example.com");
$history = new ProfileHistory();

$history->save($profile->save());
echo "<strong>Original Profile:</strong><br>";
$profile->display();

$profile->update("BSCS", 4);
echo "<br><strong>Updated Profile:</strong><br>";
$profile->display();

echo "<br>Undo...<br><br>";
$previous = $history->undo();
if ($previous !== null) {
    $profile->restore($previous);
}
echo "<strong>Restored Profile:</strong><br>";
$profile->display();
