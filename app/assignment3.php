<!DOCTYPE html>
<html>
  <head>
    <title>Assignment 3 - Checker Board</title>
    <link href="assets/stylesheets/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/stylesheets/assignment3.css" rel="stylesheet" type="text/css" />
    <meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
  </head>
  <body>
    <div id="contents" class="page-wrap">
      <h1>Checker Board</h1>
      <table>
        <?php for($i = 0; $i < 8; $i++){ ?>
          <tr>
            <?php for($j = 0; $j < 8; $j++){
              $color = ($i + $j)%2 == 0 ? 'red' : 'black'; ?>
              <td class="<?php echo $color ?>"></td>
            <?php } ?>
          </tr>
        <?php } ?>
      </table>
    </div>
  </body>
</html>
