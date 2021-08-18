<?php include "includes/head.php"; ?>
<?php
$getData = $conn->query("SELECT * FROM admins ORDER BY id DESC");
?>
				<!-- Start info box -->
				<div class="row mt-5">

					<div class="col-lg-4">
                        <div class="widget">
                            <div class="widget-content" style="padding:10px;">
                            <h3>Create New</h3><hr>
                            <?php
                                if(isset($_POST['submit'])){
                                    $firstname = ($_POST['firstname']);
                                    $lastname = ($_POST['lastname']);
                                    $email = ($_POST['email']);
                                    $username = ($_POST['username']);
                                    $support_email = ($_POST['support_email']);
                                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                    $phone = ($_POST['phone']);
                                    $role = ($_POST['role']);
                                    $addData = $conn->prepare("INSERT INTO admins(firstname, lastname, username, email, support_email, password, phone, role) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                                    $addData->execute([
                                        $firstname, $lastname, $username, $email, $support_email, $password, $phone, $role
                                    ]);
                                    if($addData->rowCount() > 0){
                                        echo "<div class='alert alert-success'>Created.</div>";
                                    }
                                    if($addData->rowCount() == 0){
                                        echo "<div class='alert alert-danger'>Failed.</div>";
                                    }
                                }
                            ?>
                            <form method="POST">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text" required name="firstname" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" required name="lastname" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" required name="username" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" required name="password" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="email" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Phone No.</label>
                                    <input type="text" required name="phone" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        <option value="admin">admin</option>
                                        <option value="moderator">moderator</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Support Email</label>
                                    <input type="email" name="support_email" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-md btn-success">Add + </button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

					<div class="col-lg-8">
                        <div class="widget">
                            <div class="widget-content" style="padding:10px;">
                                <div class="table-responsive">
                                    <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Role</th>
                                                    <th>Username</th>
                                                    <th>Phone</th>
                                                    <th>Fullname</th>
                                                    <th>Email Address</th>
                                                    <th>...</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                <?php while($row = $getData->fetch(PDO::FETCH_OBJ)){ ?>
                                                <tr>
                                                    <td><?php echo $row->role; ?></td>
                                                    <td><?php echo $row->username; ?></td>
                                                    <td><?php echo $row->phone; ?></td>
                                                    <td><?php echo $row->firstname. " ". $row->lastname; ?></td>
                                                    <td><?php echo $row->email; ?></td>
                                                    <td><a href="admin.php?id=<?php echo $row->id; ?>" class="btn btn-md btn-success">Manage</a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>

				
				</div>
				<!-- End of info box -->


<?php include "includes/foot.php"; ?>
		