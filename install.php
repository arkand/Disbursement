<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = "config/app.php";
    @unlink($file);
    $handle = fopen($file, 'w');
    fwrite($handle, "<?php\r\n");
    fwrite($handle, "return array(\r\n");
    fwrite($handle, "\t'dbtype' => 'mysql',\r\n");
    fwrite($handle, "\t'hostname' => '".$_POST['hostname']."',\r\n");
    fwrite($handle, "\t'database' => '".$_POST['database']."',\r\n");
    fwrite($handle, "\t'username' => '".$_POST['username']."',\r\n");
    fwrite($handle, "\t'password' => '".$_POST['password']."',\r\n");
    fwrite($handle, "\t'api_url' => '".$_POST['api_url']."',\r\n");
    fwrite($handle, "\t'api_secret' => '".$_POST['api_secret']."',\r\n");
    fwrite($handle, ");\r\n // Generated at ".date('Y-m-d H:i:s'));

    fclose($handle);
    //create table
    require_once("config/DB.php");
    $db = new DB();
    $db = $db->createTable();

    header('Location: /');
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
            <td><input type="text" class="text" value="host.docker.internal" name="hostname" placeholder="127.0.0.1"></td>
          </tr>
          <tr>
            <td>Database</td>
            <td>:</td>
            <td><input type="text" class="text" value="disbursement" name="database" placeholder="flip"></td>
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
            <td>Flip Web Service</td>
            <td></td>
            <td></td>
          </tr>
          <tr class="odd">
            <td>API Url</td>
            <td>:</td>
            <td><input type="text" readonly class="text" value="https://nextar.flip.id/disburse" name="api_url" placeholder=""></td>
          </tr>
          <tr>
            <td>API Secret</td>
            <td>:</td>
            <td><input type="text" readonly class="text" value="HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41" name="api_secret" placeholder=""></td>
          </tr>

        </tbody>
      </table>
      <button type="submit" class="btn">Submit</button>
      </form>
    </body>

</html>
