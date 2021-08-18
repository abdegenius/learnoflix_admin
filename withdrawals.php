<?php include "includes/head.php"; ?>
<?php
$getData = $conn->query("SELECT * FROM payouts ORDER BY id DESC");

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
                                                    <th>Transaction ID</th>
                                                    <th>Email Address</th>
                                                    <th>Amount(&#8358;)</th>
                                                    <th>Status</th>
                                                    <th>Request/Review Date</th>
                                                    <th>...</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                <?php while($row = $getData->fetch(PDO::FETCH_OBJ)){ ?>
                                                <tr>
                                                    <td><?php echo $row->transaction_id; ?></td>
                                                    <td><?php $getUser = $conn->query("SELECT * FROM users WHERE id = '$row->user_id'"); $user = $getUser->fetch(PDO::FETCH_OBJ); echo $user->email; ?></td>
                                                    <td><?php echo $row->amount; ?></td>
                                                    <td><?php echo $row->wstatus; ?></td>
                                                    <td><?php echo $row->created_at."/".$row->updated_at; ?></td>
                                                    <td><a href="withdrawal?id=<?php echo $row->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-chevron-right"></i></a></td>
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
		