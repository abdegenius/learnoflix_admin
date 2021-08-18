<?php include "includes/head.php"; ?>
<?php
$error = 0;
$row = [];
$table = "admins";
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
        $firstname = ($_POST['firstname']);
        $lastname = ($_POST['lastname']);
        $email = ($_POST['email']);
        $support_email = ($_POST['support_email']);
        $password = (empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $row->password);
        $phone = ($_POST['phone']);
        $role = ($_POST['role']);
        $editData = $conn->prepare("UPDATE `${table}` SET firstname=?, lastname=?, email=?, support_email=?, password=?, phone=?, role=? WHERE id=?");
        $editData->execute([
            $firstname, $lastname, $email, $support_email, $password, $phone, $role, $id
        ]);
        if($editData->rowCount() > 0){
            echo "<div class='alert alert-success'>Updated.</div>";
        }
        if($editData->rowCount() == 0){
            echo "<div class='alert alert-danger'>Failed.</div>";
        }
    }

    if(isset($_GET['delete'])){
        $id = $_GET['id'];
        $delete = $_GET['delete'];
        if($id != '' && $delete == 'yes'){
            $deleteData = $conn->prepare("DELETE FROM `${table}` WHERE id = ?");
            $deleteData->execute([
                $id
            ]);
            if($deleteData->rowCount() > 0){
                echo "<div class='alert alert-success'>Deleted.</div>";
                echo "<script>
                setTimeout(() => {
                    window.location.assign('admins')
                }, 1000)
                </script>";
            }
            if($deleteData->rowCount() == 0){
                echo "<div class='alert alert-danger'>Failed.</div>";
            }
        }
        
    }
}
?>
				<!-- Start info box -->
				<div class="row mt-5" style="margin: 0 auto;display:flex; justify-content:center; align-items:center;">

					<div class="col-lg-4 col-md-6">
                        <div class="widget">
                            <div class="widget-content" style="padding:10px;">
                            <h3>Edit Admin</h3><hr>
                            <form method="POST">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input value="<?php echo $row->firstname; ?>" type="text" name="firstname" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input value="<?php echo $row->lastname; ?>" type="text" name="lastname" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input value="<?php echo $row->username; ?>" readonly type="text" required name="username" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="<?php echo $row->email; ?>" type="email" name="email" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Phone No.</label>
                                    <input value="<?php echo $row->phone; ?>" type="text" name="phone" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        <option <?php if($row->role == "admin"){ echo 'selected'; } ?> value="admin">admin</option>
                                        <option <?php if($row->role == "moderator"){ echo 'selected'; } ?> value="moderator">moderator</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Support Email</label>
                                    <input value="<?php echo $row->support_email; ?>" type="email" name="support_email" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-md btn-success">Edit </button>
                                    <a href="admin?id=<?php echo $id; ?>&delete=yes" class="ml-4 btn btn-md btn-danger">Delete</a>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
				
				</div>
				<!-- End of info box -->


<?php include "includes/foot.php"; ?>