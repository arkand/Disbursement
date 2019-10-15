<?php
    include 'view/header.php';
?>
<body>
    <table class="table" width="90%" cellspacing="0">
        <thead>
            <tr class="odd">
            <th>Disburse ID</th>
            <th>Bank Code</th>
            <th>Account Number</th>
            <th>Amount</th>
            <th>Timestamp</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row) :?>
            <tr class="<?=($row->id %2 ? "F2F2F2":"D6D6D6")?>">
            <td><?=$row->disburse_id;?></td>
            <td><?=$row->bank_code;?></td>
            <td><?=$row->account_number;?></td>
            <td><?=$row->amount;?></td>
            <td><?=$row->timestamp;?></td>
            <td><?=$row->status;?></td>
            <td><a  href="?action=check&id=<?=$row->disburse_id;?>"> Check Status</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="content-footer">
        <div style="padding: 15px;">
        <div styel="width: 90%;">
            <h3><a  href="?action=add"> Create New Disbures</a></h3>
        </div>
        </div>
    </div>
</body>
</html>
