<?php include "includes/head.php"; ?>

<?php
$error = 0;
$row = [];
$table = "investments";
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
        $editData = $conn->prepare("UPDATE investments SET status=? WHERE id=?");
        $editData->execute([
            $status, $id
        ]);
        if($editData->rowCount() > 0){
            echo "<div class='alert alert-success'>Updated.</div>";
        }
        if($editData->rowCount() == 0){
            echo "<div class='alert alert-danger'>Failed.</div>";
        }
    }
?>

<?php $getUser = $conn->query("SELECT * FROM users WHERE id = '$row->user_id'"); $user = $getUser->fetch(PDO::FETCH_OBJ); ?>
<?php $getPlan = $conn->query("SELECT * FROM plans WHERE id = '$row->plan_id'"); $plan = $getPlan->fetch(PDO::FETCH_OBJ); ?>
				<!-- Start info box -->
				<div class="row mt-5" style="display:flex;justify-content:center;">
					<div class="col-md-6">
						<div class="widget">

                            <div class="widget-header">
                                <h4><b>Manage Investment</b></h4>
                            </div>
                            <div class="widget-content" style="padding:10px;">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" value="<?php echo $user->email; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Plan</label>
                                        <input type="text" value="<?php echo $plan->name; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount($)</label>
                                        <input type="text" value="<?php echo $row->amount; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option <?php if($row->status == "active"){ echo "selected"; } ?> value="active">active</option>
                                            <option <?php if($row->status == "completed"){ echo "selected"; } ?> value="completed">completed</option> 
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
		