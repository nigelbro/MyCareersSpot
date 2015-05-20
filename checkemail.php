<?php // Example 26-6: checkuser.php
  require_once 'functions.php';

  if (isset($_POST['email']))
  {
    $email   = sanitizeString($_POST['email']);
    $result = queryMysql("SELECT * FROM job_seekers WHERE Email='$email'");

    if ($result->num_rows)
      echo  "<span class='taken'id='emailstatus'>" .
            "This email address is already in use</span>";
    else
      echo "<span class='available'>&nbsp;&#x2714; " .
           "This Email is available</span>";
  }
?>
