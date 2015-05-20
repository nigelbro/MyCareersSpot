<?php
require_once 'functions.php';

function reArrangeArrayFiles(&$file_post) {

    $resume_array = array();
    $resume_count = count($file_post['name']);
    $resume_keys = array_keys($file_post);

    for ($i=0; $i<$resume_count; $i++) {
        foreach ($resume_keys as $key) {
            $resume_array[$i][$key] = $file_post[$key][$i];
        }
    }

    return $resume_array;
}

$result = queryMysql("SELECT * FROM job_seekers WHERE Email='$email'");

if(isset($_POST['upload']) && $_FILES['resumes']['size'] > 0)
{
$resume_array = reArrangeArrayFiles($_FILES['resumes']);

    foreach ($resume_array as $file) {
        print 'File Name: ' . $file['name']."\n";
        print 'File Type: ' . $file['type']."\n";
        echo 'File Size: ' . $file['size'];
    }

} 
?>
