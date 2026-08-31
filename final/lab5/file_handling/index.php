<?php
// echo readfile("content.txt"); // content . content size (bytes)

// // read mode
// $file_stream = fopen("content.txt", 'r') or die("Unable to open file");
// echo fread($file_stream, filesize("content.txt"));
// fclose($file_stream);

// write mode
// $new_file_stream = fopen('newfile.txt', 'w') or die("Unable to write/create file");
// $new_content = "AIUB\nCSE";
// fwrite($new_file_stream, $new_content);
// fclose($new_file_stream);

// append mode
$append_file_stream = fopen('newfile.txt', 'a') or die ("Unable to append to file");
fwrite($append_file_stream, "\nWeb Tech");
fclose($append_file_stream);