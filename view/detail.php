<?php
    include 'view/header.php';
?>
<body>
    <table class="table" width="90%" cellspacing="0">
        <tbody>
            <?php foreach($row as $key=>$value) :?>
            <tr>
            <td><?=$key?></td>
            <td>:</td>
            <td><?=$value?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>