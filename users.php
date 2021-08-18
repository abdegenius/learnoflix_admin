<?php include "includes/head.php"; ?>
<?php
$getData = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>
				<!-- Start info box -->
				<div class="row mt-5">
					<div class="col-12">
                        <div class="widget">
                            <div class="widget-content" style="padding:10px;">
                                <div class="table-responsive">
                                    <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
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
                                                    <td><?php echo $row->typ; ?></td>
                                                    <td><?php echo $row->username; ?></td>
                                                    <td><?php echo $row->phone; ?></td>
                                                    <td><?php echo $row->firstname. " ". $row->lastname; ?></td>
                                                    <td><?php echo $row->email; ?></td>
                                                    <td><a href="user?id=<?php echo $row->id; ?>" class="btn btn-md btn-success">Manage</a></td>
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
		