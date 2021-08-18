<?php include "includes/head.php"; ?>
<?php
$getData = $conn->query("SELECT * FROM investments ORDER BY id DESC");
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
                                                    <th>Email Address</th>
                                                    <th>Plan</th>
                                                    <th>Amount($)</th>
                                                    <th>Status</th>
                                                    <th>Start Date</th>
                                                    <th>...</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                <?php while($row = $getData->fetch(PDO::FETCH_OBJ)){ ?>
                                                <tr>
                                                    <td><?php $getUser = $conn->query("SELECT * FROM users WHERE id = '$row->user_id'"); $user = $getUser->fetch(PDO::FETCH_OBJ); echo $user->email; ?></td>
                                                    <td><?php $getPlan = $conn->query("SELECT * FROM plans WHERE id = '$row->plan_id'"); $plan = $getPlan->fetch(PDO::FETCH_OBJ); echo $plan->name; ?></td>
                                                    <td><?php echo $row->amount; ?></td>
                                                    <td><?php echo $row->status; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($row->created_at)); ?></td>
                                                    <td><a href="investment?id=<?php echo $row->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-chevron-right"></i></a></td>
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
		