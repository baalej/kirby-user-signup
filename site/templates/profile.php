<?php

$API_KEY = 'BJpjHNU-9-VmLzDyEQm4zqshvzrhYycuGmxOmpVh8UuFn-7D6HajcLBSxJ2VxoJzbKbR_fwAmYLVw5LkbhpN-Q';

?>


<?php snippet('header') ?>

<div class="intro">
<h1><?= $page->title()->html() ?></h1>
</div>

<article>
    <div class="text">
      <?php if ($kirby->user()) : ?>
        <?php
        
        $email = $kirby->user()->email();

        $API_URL_EMAIL = 'https://api.littlegreenlight.com/api/v1/constituents/search.json?q%5B%5D=eaddr%3D' . $email . '&limit=25';

        // create & initialize a curl session
        $curl = curl_init();

        // set our url with curl_setopt()
        curl_setopt($curl, CURLOPT_URL, $API_URL_EMAIL);

        // return the transfer as a string, also with setopt()
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // API Key
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $API_KEY . ":"); 

        // curl_exec() executes the started curl session
        // $output contains the output string
        $output = curl_exec($curl);

        // close curl resource to free up system resources
        // (deletes the variable made by curl_init)
        curl_close($curl);

        // print($output);

        // format response
        $response = json_decode($output, true);

        // dump($response)
        
        ?>
        <?php if ($response["total_items"] > 0): ?>
          Welcome, <?= $response["items"][0]["first_name"] ?>!
        <?php else: ?>
          This email is not recognized from a constituent please contact support@bibsocamer.com
        <?php endif ?>
      <?php else: ?>
        Login to access this page.
      <?php endif ?>
    </div>
</article>

<?php snippet('footer') ?>