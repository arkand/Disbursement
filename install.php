<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    $handle = fopen('/config/app.php', 'w') or die('Cannot create configuration file');

    $line = '<?php'.'\n';
    $line = '<?php'.'\n';
    $line = '<?php'.'\n';
    fwrite($handle, $data);
    $new_data = "\n".'New data line 2';
    fwrite($handle, $new_data);

    fclose($handle);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="assets/app.css" rel="stylesheet">
        <title>Install</title>
    </head>
    <body>
      <form method="post" action="">
      <table class="table" width="90%" cellspacing="0">
        <thead>
            <tr>
            <th colspan="3"><h2>Create Configuration File</h2></th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <td>DB Connection</td>
            <td>:</td>
            <td><input type="text" class="text" value="mysql" readonly name="dbtype" placeholder="mysql"></td>
          </tr>
          <tr class="odd">
            <td>Hostname</td>
            <td>:</td>
            <td><input type="text" class="text" value="" name="hostname" placeholder="127.0.0.1"></td>
          </tr>
          <tr>
            <td>Database</td>
            <td>:</td>
            <td><input type="text" class="text" value="" name="database" placeholder=""></td>
          </tr>
          <tr class="odd">
            <td>Username</td>
            <td>:</td>
            <td><input type="text" class="text" value="" name="username" placeholder=""></td>
          </tr>
          <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" class="text" value="" name="password" placeholder=""></td>
          </tr>
          <tr>
            <td>API Service</td>
            <td></td>
            <td></td>
          </tr>
          <tr class="odd">
            <td>API Url</td>
            <td>:</td>
            <td><input type="text" class="text" value="" name="api_url" placeholder=""></td>
          </tr>
          <tr>
            <td>API Secret</td>
            <td>:</td>
            <td><input type="text" class="text" value="" name="api_secret" placeholder=""></td>
          </tr>

        </tbody>
      </table>
      <button type="submit" class="btn">Submit</button>
      </form>
    </body>
  
</html>
