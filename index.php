<?php include "includes/head.php"; ?>

				<!-- Start info box -->
				<div class="row top-summary">
					<div class="col-lg-3 col-md-6">
						<div class="widget green-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-book"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL <b>COURSES</b></p>
									<h2><span class="animate-number" data-value="<?php $ti = $conn->query("SELECT COUNT(*) FROM courses")->fetchColumn(); echo $ti; ?>" data-duration="3000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget darkblue-2 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL <b>PURCHASES</b></p>
									<h2><span class="animate-number" data-value="<?php $ti = $conn->query("SELECT COUNT(*) FROM purchases")->fetchColumn(); echo $ti; ?>" data-duration="3000">0</span></h2>

									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget orange-4 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-upload"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL <b>WITHDRAWALS</b></p>
									<h2><span class="animate-number" data-value="<?php $ti = $conn->query("SELECT COUNT(*) FROM payouts")->fetchColumn(); echo $ti; ?>" data-duration="3000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget red-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-users"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL <b>STUDENTS</b></p>
									<h2><span class="animate-number" data-value="<?php $ti = $conn->query("SELECT COUNT(*) FROM users WHERE category = 'student'")->fetchColumn(); echo $ti; ?>" data-duration="<?php $ti = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn(); echo $ti; ?>">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget lightblue-2 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-gavel"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL <b>ADMINS</b></p>
									<h2><span class="animate-number" data-value="<?php $ti = $conn->query("SELECT COUNT(*) FROM admins")->fetchColumn(); echo $ti; ?>" data-duration="<?php $ti = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn(); echo $ti; ?>">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget blue-2 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-graduation-cap"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL <b>COACHES</b></p>
									<h2><span class="animate-number" data-value="<?php $ti = $conn->query("SELECT COUNT(*) FROM users WHERE category = 'ecoach'")->fetchColumn(); echo $ti; ?>" data-duration="<?php $ti = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn(); echo $ti; ?>">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget green-2 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-link"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL <b>AFFILIATES</b></p>
									<h2><span class="animate-number" data-value="<?php $ti = $conn->query("SELECT COUNT(*) FROM users WHERE category = 'affiliate'")->fetchColumn(); echo $ti; ?>" data-duration="<?php $ti = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn(); echo $ti; ?>">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget orange-2 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-tag"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL <b>EPINS</b></p>
									<h2><span class="animate-number" data-value="<?php $ti = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn(); echo $ti; ?>" data-duration="<?php $ti = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn(); echo $ti; ?>">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- End of info box -->


<?php include "includes/foot.php"; ?>
		