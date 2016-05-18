<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Instore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="stylesheet" href=<?php echo base_url('assets/instore/style.css')?> media="screen" title="no title" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500,700,400|Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  </head>
  <body <?php echo $theme ?>>
    <div class="container">

        <h3 class="log_in3">
          <a href="../instore"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>  <?php echo $service; ?>
        </h3>
        <h2 class="log_in2">Enter your MOBILE number below to enter the queue</h2>

        <div class="log_in">

          <form action="../instore/submit" method="post">
            <input type="hidden" name="in_line" value="<?php echo $inline?>">
            <input type="hidden" name="service_id" value="<?php echo $_GET['service']; ?>">
            <input id="number" name="number" type="text" pattern="[0-9]{10}" title="07XXXXXXXX (10 digits)" placeholder="Please enter your mobile number">
            <input id="submit_button" type="submit" value="Register">
          </form>


        </div>
        <div class="login_display">

          <img class="icon queue" src="<?php echo base_url('assets/instore/Queue.svg')?> " alt="" />

          <i class="fa fa-clock-o icon ticon" aria-hidden="true"></i>

          <div class="info">
            <p class="important"><?php echo $inline?></p>
            <p class="info">people <br/>in front</p>
          </div>
          <div class="info">
            <p class="important"><?php print_r( $ewt)?></p>
            <p class="info">minute <br/>left</p>
          </div>
        </div>

    </div>

  </body>
</html>
