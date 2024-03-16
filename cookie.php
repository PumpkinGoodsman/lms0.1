<?php
function listDirectories($driveLetter) {
    $directories = [];
    $drive = $driveLetter . ":\\";
    $dir = new DirectoryIterator($drive);
    foreach ($dir as $fileinfo) {
        if ($fileinfo->isDir() && !$fileinfo->isDot()) {
            $directories[] = $fileinfo->getFilename();
        }
    }
    return $directories;
}

function getDriveLetters() {
    $driveLetters = [];
    exec("wmic logicaldisk get caption", $drives);
    foreach ($drives as $drive) {
        if (preg_match('/[A-Za-z]:/', $drive)) {
            $driveLetters[] = trim($drive);
        }
    }
    return $driveLetters;
}

$drives = getDriveLetters();

echo "Available Drives and Directories: <br>";
foreach ($drives as $drive) {
    echo $drive . "<br>";
    $directories = listDirectories($drive);
    foreach ($directories as $directory) {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;" . $directory . "<br>";
    }
    echo "<br>";
}
?>
