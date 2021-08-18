<?php include "includes/head.php"; ?>

<?php
$error = 0;
$row = [];
$table = "payouts";
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = trim($_GET['id']);
    $getData = $conn->prepare("SELECT * FROM `${table}` WHERE id = ?");
    $getData->execute([$id]);
    if($getData->rowCount() > 0){
        $row = $getData->fetch(PDO::FETCH_OBJ);
    }
}
else{
    $error = 1;
}
if($error == 1 && empty($row)){
    echo '<h3>Access Forbidden</h3>';
}
else{
    if(isset($_POST['submit'])){
        $status = $_POST['status'];
        $editData = $conn->prepare("UPDATE payouts SET wstatus=?, approved_by = ? WHERE id=?");
        $editData->execute([
            $status, $_SESSION['admin'], $id
        ]);
        if($editData->rowCount() > 0){
            echo "<div class='alert alert-success'>Updated.</div>";
            if($status == "approved"){
                $getWallet = $conn->query("SELECT * FROM wallets WHERE user_id = '$row->user_id'");
                $wallet = $getWallet->fetch(PDO::FETCH_OBJ);
                $newAmount = $wallet->balance - $row->amount;
                if($newAmount > 0){
                    $editWallet = $conn->prepare("UPDATE wallets SET balance=? WHERE id=?");
                    $editWallet->execute([$newAmount, $wallet->id]);
                }
                else{
                    echo "<div class='alert alert-info'>Error! User amount less than requested withdrawal amount.</div>";
                }
            }
        }
        if($editData->rowCount() == 0){
            echo "<div class='alert alert-danger'>Failed.</div>";
        }
    }
?>

<?php $getUser = $conn->query("SELECT * FROM users WHERE id = '$row->user_id'"); $user = $getUser->fetch(PDO::FETCH_OBJ); ?>
				<!-- Start info box -->
				<div class="row mt-5" style="display:flex;justify-content:center;">
					<div class="col-md-6">
						<div class="widget">

                            <div class="widget-header">
                                <h4><b>Manage Withdrawal</b></h4>
                            </div>
                            <div class="widget-content" style="padding:10px;">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" value="<?php echo $user->email; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount(&#8358;)</label>
                                        <input type="text" value="<?php echo $row->amount; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Bank Name :</b>
                                                <?php echo $user->bank; ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Account Name :</b>
                                                <?php echo $user->accountname; ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Account Number :</b>
                                                <?php echo $user->accountnumber; ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Momo Account Name :</b>
                                                <?php echo $user->momoaccountname; ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Momo Account Number :</b>
                                                <?php echo $user->momoaccountnumber; ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Paypal Email :</b>
                                                <?php echo $user->paypalemail; ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Payoneer Email :</b>
                                                <?php echo $user->payoneeremail; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">                                        
                                            <option <?php if($row->status == "pending"){ echo "selected"; } ?> value="pending">pending</option> 
                                            <option <?php if($row->status == "approved"){ echo "selected"; } ?> value="approved">approved</option>
                                            <option <?php if($row->status == "declined"){ echo "selected"; } ?> value="declined">declined</option> 
                                            <option <?php if($row->status == "cancelled"){ echo "selected"; } ?> value="cancelled">cancelled</option>
                                        </select>
                                    </div>
                                    <hr>
                                    <button type="submit" name="submit" class="btn btn-block btn-md btn-success">Update</button>
                                </form>
                            </div>

                        </div>
					</div>
				
				</div>
				<!-- End of info box -->
                
<?php } ?>

<?php include "includes/foot.php"; ?>
		