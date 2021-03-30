<?php
// router.php
if (preg_match('/\.(?:txt)$/', $_SERVER["REQUEST_URI"])) {
    echo "<p>Access Denied!</p>";  // Access to .txt file is denied
} else {
    return false; // serve the requested resource as-is.
}
?>
