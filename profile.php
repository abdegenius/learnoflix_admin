<?php include "includes/head.php"; ?>

				<!-- Start info box -->
				<div class="row mt-5" style="display:flex;justify-content:center;">
					<div class="col-md-6">
						<div class="widget">

                            <div class="widget-header">
                                <h4><b>My Profile</b></h4>
                            </div>
                            <div class="widget-content" style="padding:10px;">
                            <p>
                            <img src="images/admin.png" class="img-circle not-logged-avatar">
                            </p>
                            <br>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <b>firstname:</b>
                                        <?php echo $admin->firstname; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <b>lastname:</b>
                                        <?php echo $admin->lastname; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <b>email:</b>
                                        <?php echo $admin->email; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <b>support email:</b>
                                        <?php echo $admin->support_email; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <b>phone:</b>
                                        <?php echo $admin->phone; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <b>role:</b>
                                        <?php echo $admin->role; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <b>username:</b>
                                        <?php echo $admin->username; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="logout" class="btn btn-md btn-block btn-danger text-white">Log Out</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
					</div>
				
				</div>
				<!-- End of info box -->


<?php include "includes/foot.php"; ?>
		