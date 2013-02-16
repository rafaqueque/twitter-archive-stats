<?php 

  if (!$argv[1])
  {
    die("* hey, we need a file.");
  }
  else
  {

    if (file_exists($argv[1]))
    {
      $path = $argv[1];
      $stats = array();

      if (($handle = fopen($path, 'r')) !== FALSE) 
      {
        while (($data = fgetcsv($handle, 2000, ',','"')) !== FALSE) 
        {
          if ($data[0]) $stats['tweets'] += 1;
          if ($data[2]) $stats['replies'] += 1;
          if ($data[3]) $stats['retweets'] += 1;
        }
      }

      print_r($stats);

    }

  }

?>