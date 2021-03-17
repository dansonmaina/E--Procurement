<?php 

$data1 = "Data";
$data1_val = 46;
$data2 = "Data2";
$data2_val = 24;
$data3 = "Data3";
$data3_val = 48;
$data4 = "Data4";
$data4_val = 48;

$donut_chart = "[['$data1', $data1_val], ['$data2', $data2_val], ['$data3', $data3_val], ['$data4', $data4_val]]";
$rotated_chart = "[['data1', 30, 300, 100, 400, 150, 250], ['data2', 50, 20, 10, 40, 15, 25]]";
$combined_chart = "[['Desktop', 30, 20, 50, 40, 60, 50], ['Mobiles', 200, 130, 90, 240, 130, 220], ['Tablets', 300, 200, 160, 400, 250, 250], ['Android', 200, 130, 90, 240, 130, 220], ['ios', 130, 120, 150, 140, 160, 150]]";

?>

<link rel="stylesheet"
href="vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="css/main.css">
<section>
	<!-- Page content-->
	<div class="content-wrapper">

		<!-- START widgets box-->
		<div class="row dash-margin">
			<div class="col-xl-3 col-md-6" style="cursor:pointer" onclick="selectDashItem(47);">
				<div class="card widget-box-two bg-purple">
					<div class="card-body">
						<div class="media">
							<div class="media-body wigdet-two-content">
								<p class="m-0 text-uppercase text-white" title="Statistics">
									1.7 xCrud User/Role
								</p>
								<h2 class="text-white"><span data-plugin="counterup">3</span><i class="mdi mdi-arrow-up text-white font-22"></i></h2>
								<p class="text-white m-0">
									<b>10%</b> From previous period
								</p>
							</div>
							<div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
								<i class="mdi mdi-chart-line font-22 avatar-title text-white"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6" style="cursor:pointer" onclick="selectDashItem(48);">
				<div class="card widget-box-two bg-info">
					<div class="card-body">
						<div class="media">
							<div class="media-body wigdet-two-content">
								<p class="m-0 text-white text-uppercase" title="User Today">
									1.7 xCrud Layouts
								</p>
								<h2 class="text-white"><span data-plugin="counterup">2</span><i class="mdi mdi-arrow-up text-white font-22"></i></h2>
								<p class="text-white m-0">
									<b>5.6%</b> From previous period
								</p>
							</div>
							<div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
								<i class="mdi mdi-access-point-network  font-22 avatar-title text-white"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6" style="cursor:pointer" onclick="selectDashItem(63);">
				<div class="card widget-box-two bg-pink">
					<div class="card-body">
						<div class="media">
							<div class="media-body wigdet-two-content">
								<p class="m-0 text-uppercase text-white" title="Request Per Minute">
									xCrud 1.7 Inline Editing
								</p>
								<h2 class="text-white"><span data-plugin="counterup">4</span><i class="mdi mdi-arrow-up text-white font-22"></i></h2>
								<p class="text-white m-0">
									<b>7.02%</b> From previous period
								</p>
							</div>
							<div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
								<i class="mdi mdi-timetable font-22 avatar-title text-white"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6" style="cursor:pointer" onclick="selectDashItem(49);">
				<div class="card widget-box-two bg-success">
					<div class="card-body">
						<div class="media">
							<div class="media-body wigdet-two-content">
								<p class="m-0 text-white text-uppercase" title="New Downloads">
									Image Uploads & Resize
								</p>
								<h2 class="text-white"><span data-plugin="counterup">10</span><i class="mdi mdi-arrow-up text-white font-22"></i></h2>
								<p class="text-white m-0">
									<b>9.9%</b> From previous period
								</p>
							</div>
							<div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
								<i class="mdi mdi-cloud-download font-22 avatar-title text-white"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6" style="cursor:pointer" onclick="selectDashItem(57);">
				<div class="card widget-box-two bg-success">
					<div class="card-body">
						<div class="media">
							<div class="media-body wigdet-two-content">
								<p class="m-0 text-white text-uppercase" title="New Downloads">
									xCrud 1.7 Tabulator
								</p>
								<h2 class="text-white"><span data-plugin="counterup">8</span><i class="mdi mdi-arrow-up text-white font-22"></i></h2>
								<p class="text-white m-0">
									<b>9.9%</b> From previous period
								</p>
							</div>
							<div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
								<i class="mdi mdi-cloud-download font-22 avatar-title text-white"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6" style="cursor:pointer" onclick="selectDashItem(62);">
				<div class="card widget-box-two bg-pink">
					<div class="card-body">
						<div class="media">
							<div class="media-body wigdet-two-content">
								<p class="m-0 text-uppercase text-white" title="Request Per Minute">
									xCrud 1.6 Features
								</p>
								<h2 class="text-white"><span data-plugin="counterup">4</span><i class="mdi mdi-arrow-up text-white font-22"></i></h2>
								<p class="text-white m-0">
									<b>7.02%</b> From previous period
								</p>
							</div>
							<div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
								<i class="mdi mdi-timetable font-22 avatar-title text-white"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
			$xcrud = Xcrud::get_instance();
			?>

			<script src="lib/xcrud/plugins/jquery.min.js"></script>
		</div>
		<div class="row">
			<div class="col-xl-4">
				<div class="card">
					<div class="card-body">
						<h4 class="header-title mb-3">Last 30 days statistics</h4>

						<div dir="ltr">
							<div id="donut-chart"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="card">
					<div class="card-body">
						<h4 class="header-title mb-3">Total Revenue share</h4>
						<div dir="ltr">
							<div id="combine-chart"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4">
				<div class="card">
					<div class="card-body">
						<h4 class="header-title mb-3">Total Revenue share</h4>
						<div dir="ltr">
							<div id="roated-chart"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END widgets box-->
		<script>
			function selectDashItem(val) {
				console.log(val);
				document.getElementById("selectRoleVal").value = val;
				//Option 10
				selectRole();
			}

		</script>

		<!-- plugins -->
		<script src="Admin/Horizontal/dist/assets/libs/c3/c3.min.js"></script>
		<script src="Admin/Horizontal/dist/assets/libs/d3/d3.min.js"></script>
		<!--<script src="Admin/Horizontal/dist/assets/js/pages/dashboard.init.js"></script>-->

		<script>
		
		    
			! function(t) {
				"use strict";
				var a = function() {
				};
				a.prototype.init = function() {
					c3.generate({
						bindto : "#combine-chart",
						data : {
							columns : <?php echo $combined_chart; ?>,
							types : {
								Desktop : "line",
								Mobiles : "line",
								Tablets : "line",
								Android : "line",
								ios : "line"
							},
							colors : {
								Desktop : "#1ea69a",
								Mobiles : "#f7531f",
								Tablets : "#8892d6",
								Android : "#45bbe0",
								ios : "#3b3e47"
							}
						},
						axis : {
							x : {
								type : "categorized"
							}
						}
					}), c3.generate({
						bindto : "#roated-chart",
						data : {
							columns : <?php echo $rotated_chart; ?>,
							types : {
								data1 : "bar"
							},
							colors : {
								data1 : "#1ea69a",
								data2 : "#f7531f"
							}
						},
						axis : {
							rotated : !0,
							x : {
								type : "categorized"
							}
						}
					}), c3.generate({
						bindto : "#donut-chart",
						data : {
							columns : <?php echo $donut_chart ?>,
							type : "donut"
						},
						donut : {
							title : "Candidates",
							width : 40,
							label : {
								show : !1
							}
						},
						color : {
							pattern : ["#348cd4", "#eee", "#f7531f", "#ff9800"]
						}
					})
				}, t.Dashboard = new a, t.Dashboard.Constructor =
				a
			}(window.jQuery), function(t) {
				"use strict";
				window.jQuery.Dashboard.init()
			}();

		</script>

		<script src="Admin/Vertical/dist/assets/js/vendor.min.js"></script>

	</div>
</section>