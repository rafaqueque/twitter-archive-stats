<?php 

  if (!$argv[1])
  {
    die("* ERROR * syntax is: php ".basename(__FILE__)." /path/to/tweets.csv \n");
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
          if ($data[0]) 
            $stats['tweets'] += 1;

          if ($data[2]) 
            $stats['replies'] += 1;

          if ($data[3]) 
            $stats['retweets'] += 1;

          $stats['first_tweet'] = $data;
        }
      }

      echo "here's your (raw) data: \n";
      print_r($stats);

    }
    else
    {
      die("* ERROR * specified path (".$argv[1].") doesn't exist \n");
    }

  }

?>