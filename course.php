<?php include "includes/head.php"; ?>

<?php
$error = 0;
$row = [];
$table = "courses";
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
        $islive = $_POST['islive'];
        $editData = $conn->prepare("UPDATE courses SET islive=? WHERE id=?");
        $editData->execute([
            $islive, $id
        ]);
        if($editData->rowCount() > 0){
            echo "<div class='alert alert-success'>Updated.</div>";
        }
        if($editData->rowCount() == 0){
            echo "<div class='alert alert-danger'>Failed.</div>";
        }
    }
?>

<?php $getUser = $conn->query("SELECT * FROM users WHERE id = '$row->ecoach_id'"); $user = $getUser->fetch(PDO::FETCH_OBJ); ?>
				<!-- Start info box -->
				<div class="row mt-5" style="display:flex;justify-content:center;">
					<div class="col-md-6">
						<div class="widget">

                            <div class="widget-header">
                                <h4><b>Manage Course</b></h4>
                            </div>
                            <div class="widget-content" style="padding:10px;">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Creator</label>
                                        <input type="text" value="<?php echo $row->creator; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Original Price(&#8358;)</label>
                                        <input type="text" value="<?php echo $row->price; ?>"  class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Sale Price(&#8358;)</label>
                                        <input type="text" value="<?php echo $row->discount; ?>"  class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" value="<?php echo $row->title; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="text" value="<?php $getCategory = $conn->query("SELECT * FROM categories WHERE id = '$row->category_id'");
                                        $category = $getCategory->fetch(PDO::FETCH_OBJ);
                                        echo $category->title; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Tags</label>
                                        <input type="text" value="<?php echo $row->tags; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Belongs To</label>
                                        <input type="text" value="<?php echo $row->belongs_to; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Time</label>
                                        <input type="text" value="<?php echo $row->total_time; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Affiliate Percentage(%)</label>
                                        <input type="text" value="<?php echo $row->affiliate_percentage; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Intro Video</label>
                                        <input type="text" value="<?php echo $row->intro_video; ?>" readonly class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <p><?php echo $row->description; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <p><?php echo $row->status; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Is Live</label>
                                        <select name="islive" class="form-control">
                                            <option <?php if($row->islive == 1){ echo "selected"; } ?> value="1">yes</option> 
                                            <option <?php if($row->islive == 0){ echo "selected"; } ?> value="0">no</option>
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
		