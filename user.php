<?php include "includes/head.php"; ?>
<?php
$error = 0;
$row = [];
$wallet = [];
$table = "users";
$id = "";
$category = "";
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = trim($_GET['id']);
    $category = trim($_GET['category']);;
    $getData = $conn->prepare("SELECT * FROM `${table}` WHERE id = ?");
    $getData->execute([$id]);
    if($getData->rowCount() > 0){
        $row = $getData->fetch(PDO::FETCH_OBJ);
        $getWallet = $conn->prepare("SELECT * FROM `wallets` WHERE user_id = ?");
        $getWallet->execute([$id]);
        if($getWallet->rowCount() > 0){
            $wallet = $getWallet->fetch(PDO::FETCH_OBJ);
        }
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
        $balance = ucwords($_POST['balance']);
        $editData = $conn->prepare("UPDATE wallets SET balance=? WHERE user_id=?");
        $editData->execute([
            $balance, $id
        ]);
        if($editData->rowCount() > 0){
            echo "<div class='alert alert-success'>Updated.</div>";
        }
        if($editData->rowCount() == 0){
            echo "<div class='alert alert-danger'>Failed.</div>";
        }
    }
?>
				<!-- Start info box -->
				<div class="row mt-5" style="display:flex;justify-content:center;">
					<div class="col-md-6">
						<div class="widget">

                            <div class="widget-header">
                                <h4><b>Manage <?php echo ucwords($category); ?> </b></h4>
                            </div>
                            <div class="widget-content" style="padding:10px;">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <b>Email : </b>
                                    <?php echo $row->email; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone: </b>
                                    <?php echo $row->phone; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Firstname: </b>
                                    <?php echo $row->firstname; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Lastname: </b>
                                    <?php echo $row->lastname; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Gender: </b>
                                    <?php echo $row->gender; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Country: </b>
                                    <?php echo $row->country; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>State: </b>
                                    <?php echo $row->state; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>City: </b>
                                    <?php echo $row->city; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Street: </b>
                                    <?php echo $row->street; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Student Referral Code: </b>
                                    <?php echo $row->studentcode; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Affiliate Referral Code: </b>
                                    <?php echo $row->affiliatecode; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Ecoach Referral Code: </b>
                                    <?php echo $row->ecoachcode; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Bank: </b>
                                    <?php echo $row->bank; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Account Name: </b>
                                    <?php echo $row->accountname; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Account Number: </b>
                                    <?php echo $row->accountnumber; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Paypal Email: </b>
                                    <?php echo $row->paypalemail; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Payoneer Email: </b>
                                    <?php echo $row->payoneeremail; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>MOMO Account Name: </b>
                                    <?php echo $row->momoaccountname; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>MOMO Account Number: </b>
                                    <?php echo $row->momoaccountnumber; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Sponsor ID: </b>
                                    <?php echo $row->sponsor; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Status: </b>
                                    <?php echo $row->status ? "Active" : "Unactive"; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Expire Date: </b>
                                    <?php echo $row->expiredate; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Member Since: </b>
                                    <?php echo $row->created_at; ?>
                                </li>
                            </ul>
                            <br>
                            <hr>
                            <h3>WALLET BALANCE</h3>
                            <br>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Available Balance</label>
                                        <input type="number" value="<?php echo $wallet->balance; ?>" name="balance" class="form-control"/>
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
		