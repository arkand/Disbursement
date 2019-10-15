<?php
    include 'view/header.php';
?>
<body>
    <form method="post" action="?action=create">
    <table class="table" width="80%" cellspacing="0">
        <tbody>
            <tr>
                <td style="width:10%">Bank Code</td>
                <td style="width:1%">:</td>
                <td style="width:20%"><input type="text" class="text" value="bri" name="bank_code" placeholder="Bank code" maxlength="10"></td>
            </tr>
            <tr>
                <td>Account Number</td>
                <td>:</td>
                <td><input type="text" class="text" value="" name="account_number" placeholder="Account Number" maxlength="20"></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td>:</td>
                <td><input type="number" class="text" value="" name="amount" placeholder="Amount" maxlength="7" max="5000000"></td>
            </tr>
            <tr>
                <td>Remark</td>
                <td>:</td>
                <td><input type="text" class="text" value="" name="remark" placeholder="Keterangan" maxlength="200"></td>
            </tr>
        </tbody>
    </table>
        <button type="submit" class="btn">Submit</button>
    </form>
    <br/>
</body>
</html>