</div>
		</div>
		<!--footer-->
		 <div class="dev-page">
	 
			<!-- page footer -->   
			<!-- dev-page-footer-closed dev-page-footer-fixed -->
            <div class="dev-page-footer dev-page-footer-fixed"> 
				<!-- container -->
				<div class="container">
					<div class="copyright">
						<p>&#169; Copyright <?php echo date("Y"); ?> Design by <a href="http://www.microresolve.com/" target="_blank" style="color:#fff;">MicroResolve</a>  -  All Rights Reserved.</p>  
					</div>
					<!-- page footer buttons -->
					<ul class="dev-page-footer-buttons">                    
						<li><a href="#footer_content_1" class="dev-page-footer-container-open"><span class="glyphicon glyphicon glyphicon-sort" aria-hidden="true"></span></a></li>                    
						<li><a href="#footer_content_2" class="dev-page-footer-container-open"><span class="glyphicon glyphicon glyphicon-signal" aria-hidden="true"></span></a></li>
						<li><a href="#footer_content_3" class="dev-page-footer-container-open"><span class="glyphicon glyphicon glyphicon glyphicon-file" aria-hidden="true"></span></a></li>
					</ul>
					<!-- //page footer buttons -->
					<!-- page footer container -->
					<div class="dev-page-footer-container">
						
						<!-- loader and close button -->
						<div class="dev-page-footer-container-layer">
							<a href="#" class="dev-page-footer-container-layer-button"></a>
						</div>
						<!-- //loader and close button -->                    
						
						<!-- informers -->
						<div class="dev-page-footer-container-content" id="footer_content_1">                        
							<div class="block-hdnews">
								  <div class="list-wrpaaer" style="height:200px;">
									 <ul class="list-aggregate" id="marquee-horizontal">
									   <li class="fat-l" style="width:300px">
										<a href="#">Lorem ipsum dolor</a>
										<p>
										   Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.										
										 </p>
									   </li>
									   
									   <li class="fat-l" style="width:300px">
										<a href="#">Consectetur</a>
										<p>
										   Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.										
										 </p>
									   </li>
									   
									   <li class="fat-l" style="width:300px">
										 <a href="#">Adipiscing elit</a>
										 <p>
										   Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.										
										 </p>
									   </li>

									   <li class="fat-l" style="width:300px">
										<a href="#">Lorem ipsum dolor</a>
										 <p>
										   Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.										
										 </p>
									   </li>
										<li class="fat-l" style="width:300px">
										<a href="#">Consectetur</a>
										 <p>
										   Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.										
										 </p>
									   </li>
									   
									   <li class="fat-l" style="width:300px">
										 <a href="#">Adipiscing elit</a>
										 <p>
										   Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.										
										 </p>
									   </li>

									 </ul>
								  </div><!-- list-wrpaaer -->

							  </div> <!-- block-hdnews -->

						<script type="text/javascript">
						  
						  $(function(){


						  $('#marquee-vertical').marquee();  
						  $('#marquee-horizontal').marquee({direction:'horizontal', delay:0, timing:50});  

						});

						</script>                   
						</div>
						<!-- //informers -->
						
						<!-- informers -->
						<div class="dev-page-footer-container-content" id="footer_content_2">   
							<div class="graphs">
								<div class="col-md-4 graph-points">
									<div class="graph-left">
									   <script type="text/javascript">
										  // Generate data
										  
										  var data = [];
										  
										  var time = new Date('Dec 1, 2013 12:00').valueOf();
										  
										  var h = Math.floor(Math.random() * 100);
										  var l = h - Math.floor(Math.random() * 20);
										  var o = h - Math.floor(Math.random() * (h - l));
										  var c = h - Math.floor(Math.random() * (h - l));

										  var v = Math.floor(Math.random() * 1000);
										  
										  for (var i = 0; i < 30; i++) {
											data.push([time, o, h, l, c, v]);
											h += Math.floor(Math.random() * 10 - 5);
											l = h - Math.floor(Math.random() * 20);
											o = h - Math.floor(Math.random() * (h - l));
											c = h - Math.floor(Math.random() * (h - l));
											v += Math.floor(Math.random() * 100 - 50);
											time += 30 * 60000; // Add 30 minutes
										  }
										</script>
										<div id="example-1"></div>
										<script type="text/javascript">
										  $(function() {
											$('#example-1').jqCandlestick({
											  data: data,
											  theme: 'light',
											  series: [{
											  }],
											});
										  });
										</script>
									</div>
									<div class="graph-right">
										<h3>TODAY'S STATS</h3>
										<p>Duis aute irure dolor in reprehenderit.</p>
										<ul>
											<li>Earning: $400 USD</li>
											<li>Items Sold: 20 Items</li>
											<li>Last Hour Sales: $34 USD</li>
										</ul>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="col-md-4 bar-grid">
									<div class="graph-left">
										<canvas id="line"></canvas>
											<script>
													var lineChartData = {
														labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Mon"],
														datasets : [
															{
																fillColor : "rgba(202, 202, 202, 0)",
																strokeColor : "#3E495A",
																pointColor : "#fbfbfb",
																pointStrokeColor : "#fbfbfb",
																data : [20,35,45,30,10,65,40]
															}
														]
														
													};
													new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
											</script>
									</div>
									<div class="graph-right">
										<h3>TODAY'S STATS</h3>
										<p>Duis aute irure dolor in reprehenderit.</p>
										<ul>
											<li>Earning: $400 USD</li>
											<li>Items Sold: 20 Items</li>
											<li>Last Hour Sales: $34 USD</li>
										</ul>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="col-md-4 switch-right">
									<div class="graph-left">
										<canvas id="bar"></canvas>
											<script>
												var barChartData = {
													labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Mon","Tue","Wed","Thu"],
													datasets : [
														{
															fillColor : "#fbc02d",
															strokeColor : "#fbc02d",
															highlightFill: "rgba(220,220,220,0.75)",
															highlightStroke: "rgba(220,220,220,1)",
															data : [25,40,50,65,55,30,20,10,6,4]
														},
														{
															fillColor : "#3E495A",
															strokeColor : "#3E495A",
															data : [30,45,55,70,40,25,15,8,5,2]
														}
													]
													
												};
													new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
											</script>
									</div>
									<div class="graph-right">
										<h3>TODAY'S STATS</h3>
										<p>Duis aute irure dolor in reprehenderit.</p>
										<ul>
											<li>Earning: $400 USD</li>
											<li>Items Sold: 20 Items</li>
											<li>Last Hour Sales: $34 USD</li>
										</ul>
									</div>
									<div class="clearfix"> </div>
								</div>
								
								<div class="clearfix"> </div>
							</div>
						</div>
						<!-- //informers -->
						
						<!-- projects -->
						<div class="dev-page-footer-container-content" id="footer_content_3">                        
							<div class="social">
								<div class="col-md-3 top-comment-grid">
									<div class="comments">
										<div class="comments-icon">
											<i class="fa fa-comments"></i>
										</div>
										<div class="comments-info">
											<h3>85</h5>
											<a href="#">Comments</a>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="col-md-3 top-comment-grid">
									<div class="comments likes">
										<div class="comments-icon">
											<i class="fa fa-facebook"></i>
										</div>
										<div class="comments-info likes-info">
											<h3>2150</h5>
											<a href="#">Likes</a>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="col-md-3 top-comment-grid">
									<div class="comments tweets">
										<div class="comments-icon">
											<i class="fa fa-twitter"></i>
										</div>
										<div class="comments-info tweets-info">
											<h3>325</h5>
											<a href="#">Tweets</a>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="col-md-3 top-comment-grid">
									<div class="comments views">
										<div class="comments-icon">
											<i class="fa fa-eye"></i>
										</div>
										<div class="comments-info views-info">
											<h3>471</h5>
											<a href="#">Views</a>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<!-- //projects -->
					</div>
                <!-- //page footer container -->
                
                </div>
				<!-- //container -->
            </div>
            <!-- /page footer -->
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="<?= base_url(); ?>assets/backend/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- Bootstrap Core JavaScript --> 
		
        <script type="text/javascript" src="<?= base_url(); ?>assets/backend/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?= base_url(); ?>assets/backend/js/dev-loaders.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/backend/js/dev-layout-default.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets/backend/js/jquery.marquee.js"></script>
		<link href="<?= base_url(); ?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- candlestick -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/backend/js/jquery.jqcandlestick.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jqcandlestick.css" />
		<!-- //candlestick -->
		
		<!--max-plugin-->
		<script type="text/javascript" src="<?= base_url(); ?>assets/backend/js/plugins.js"></script>
		<!--//max-plugin-->
		
		<!--scrolling js-->
		<script src="<?= base_url(); ?>assets/backend/js/jquery.nicescroll.js"></script>
		<script src="<?= base_url(); ?>assets/backend/js/scripts.js"></script>
		<!--//scrolling js-->
		
		<!-- real-time-updates -->
		<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/backend/js/jquery.flot.js"></script>
		<script type="text/javascript">

		$(function() {

			// We use an inline data source in the example, usually data would
			// be fetched from a server

			var data = [],
				totalPoints = 300;

			function getRandomData() {

				if (data.length > 0)
					data = data.slice(1);

				// Do a random walk

				while (data.length < totalPoints) {

					var prev = data.length > 0 ? data[data.length - 1] : 50,
						y = prev + Math.random() * 10 - 5;

					if (y < 0) {
						y = 0;
					} else if (y > 100) {
						y = 100;
					}

					data.push(y);
				}

				// Zip the generated y values with the x values

				var res = [];
				for (var i = 0; i < data.length; ++i) {
					res.push([i, data[i]])
				}

				return res;
			}

			// Set up the control widget

			var updateInterval = 30;
			$("#updateInterval").val(updateInterval).change(function () {
				var v = $(this).val();
				if (v && !isNaN(+v)) {
					updateInterval = +v;
					if (updateInterval < 1) {
						updateInterval = 1;
					} else if (updateInterval > 2000) {
						updateInterval = 2000;
					}
					$(this).val("" + updateInterval);
				}
			});

			var plot = $.plot("#placeholder", [ getRandomData() ], {
				series: {
					shadowSize: 0	// Drawing is faster without shadows
				},
				yaxis: {
					min: 0,
					max: 100
				},
				xaxis: {
					show: false
				}
			});

			function update() {

				plot.setData([getRandomData()]);

				// Since the axes don't change, we don't need to call plot.setupGrid()

				plot.draw();
				setTimeout(update, updateInterval);
			}

			update();

			// Add the Flot version string to the footer

			$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
		});

		</script>
		<!-- //real-time-updates -->
		<!-- error-graph -->
		<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/backend/js/jquery.flot.errorbars.js"></script>
		<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/backend/js/jquery.flot.navigate.js"></script>
		<script type="text/javascript">
			$(function() {

				function drawArrow(ctx, x, y, radius){
					ctx.beginPath();
					ctx.moveTo(x + radius, y + radius);
					ctx.lineTo(x, y);
					ctx.lineTo(x - radius, y + radius);
					ctx.stroke();
				}

				function drawSemiCircle(ctx, x, y, radius){
					ctx.beginPath();
					ctx.arc(x, y, radius, 0, Math.PI, false);
					ctx.moveTo(x - radius, y);
					ctx.lineTo(x + radius, y);
					ctx.stroke();
				}

				var data1 = [
					[1,1,.5,.1,.3],
					[2,2,.3,.5,.2],
					[3,3,.9,.5,.2],
					[1.5,-.05,.5,.1,.3],
					[3.15,1.,.5,.1,.3],
					[2.5,-1.,.5,.1,.3]
				];

				var data1_points = {
					show: true,
					radius: 5,
					fillColor: "blue", 
					errorbars: "xy", 
					xerr: {show: true, asymmetric: true, upperCap: "-", lowerCap: "-"}, 
					yerr: {show: true, color: "red", upperCap: "-"}
				};

				var data2 = [
					[.7,3,.2,.4],
					[1.5,2.2,.3,.4],
					[2.3,1,.5,.2]
				];

				var data2_points = {
					show: true,
					radius: 5,
					errorbars: "y", 
					yerr: {show:true, asymmetric:true, upperCap: drawArrow, lowerCap: drawSemiCircle}
				};

				var data3 = [
					[1,2,.4],
					[2,0.5,.3],
					[2.7,2,.5]
				];

				var data3_points = {
					//do not show points
					radius: 0,
					errorbars: "y", 
					yerr: {show:true, upperCap: "-", lowerCap: "-", radius: 5}
				};

				var data4 = [
					[1.3, 1],
					[1.75, 2.5],
					[2.5, 0.5]
				];

				var data4_errors = [0.1, 0.4, 0.2];
				for (var i = 0; i < data4.length; i++) {
					data4_errors[i] = data4[i].concat(data4_errors[i])
				}

				var data = [
					{color: "blue", points: data1_points, data: data1, label: "data1"}, 
					{color: "red",  points: data2_points, data: data2, label: "data2"},
					{color: "green", lines: {show: true}, points: data3_points, data: data3, label: "data3"},
					// bars with errors
					{color: "orange", bars: {show: true, align: "center", barWidth: 0.25}, data: data4, label: "data4"},
					{color: "orange", points: data3_points, data: data4_errors}
				];

				$.plot($("#placeholder1"), data , {
					legend: {
						position: "sw",
						show: true
					},
					series: {
						lines: {
							show: false
						}
					},
					xaxis: {
						min: 0.6,
						max: 3.1
					},
					yaxis: {
						min: 0,
						max: 3.5
					},
					zoom: {
						interactive: true
					},
					pan: {
						interactive: true
					}
				});

				// Add the Flot version string to the footer

				$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
			});

			</script>
		<!-- //error-graph -->
		<!-- Skills-graph -->		
		<script src="<?= base_url(); ?>assets/backend/js/Chart.Core.js"></script>
		<script src="<?= base_url(); ?>assets/backend/js/Chart.Doughnut.js"></script>
		<script>

			var doughnutData = [
					{
						value: 2,
						label: "One",
						color:"#99CC00"
					},
					{
						value: 3,
						label: "Two",
						color:"#FF3300"
					},
					{
						value: 3,
						label: "Three",
						color:"#944DDB"
					},
					{
						value: 4,
						label: "Four",
						color:"#3399FF"
					},
					{
						value: 5,
						label: "Five",
						color:"#FFC575"
					}

				];

				window.onload = function(){
					var ctx = document.getElementById("chart-area").getContext("2d");
					window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
				};

		</script>
		<!-- //Skills-graph -->
		<!-- status -->
		<script src="<?= base_url(); ?>assets/backend/js/jquery.fn.gantt.js"></script>
		<script>

			$(function() {

				"use strict";

				$(".gantt").gantt({
					source: [{
						name: "Sprint 0",
						desc: "Analysis",
						values: [{
							from: "/Date(1320192000000)/",
							to: "/Date(1322401600000)/",
							label: "Requirement Gathering", 
							customClass: "ganttRed"
						}]
					},{
						name: " ",
						desc: "Scoping",
						values: [{
							from: "/Date(1322611200000)/",
							to: "/Date(1323302400000)/",
							label: "Scoping", 
							customClass: "ganttRed"
						}]
					},{
						name: "Sprint 1",
						desc: "Development",
						values: [{
							from: "/Date(1323802400000)/",
							to: "/Date(1325685200000)/",
							label: "Development", 
							customClass: "ganttGreen"
						}]
					},{
						name: " ",
						desc: "Showcasing",
						values: [{
							from: "/Date(1325685200000)/",
							to: "/Date(1325695200000)/",
							label: "Showcasing", 
							customClass: "ganttBlue"
						}]
					},{
						name: "Sprint 2",
						desc: "Development",
						values: [{
							from: "/Date(1326785200000)/",
							to: "/Date(1325785200000)/",
							label: "Development", 
							customClass: "ganttGreen"
						}]
					},{
						name: " ",
						desc: "Showcasing",
						values: [{
							from: "/Date(1328785200000)/",
							to: "/Date(1328905200000)/",
							label: "Showcasing", 
							customClass: "ganttBlue"
						}]
					},{
						name: "Release Stage",
						desc: "Training",
						values: [{
							from: "/Date(1330011200000)/",
							to: "/Date(1336611200000)/",
							label: "Training", 
							customClass: "ganttOrange"
						}]
					},{
						name: " ",
						desc: "Deployment",
						values: [{
							from: "/Date(1336611200000)/",
							to: "/Date(1338711200000)/",
							label: "Deployment", 
							customClass: "ganttOrange"
						}]
					},{
						name: " ",
						desc: "Warranty Period",
						values: [{
							from: "/Date(1336611200000)/",
							to: "/Date(1349711200000)/",
							label: "Warranty Period", 
							customClass: "ganttOrange"
						}]
					}],
					navigate: "scroll",
					scale: "weeks",
					maxScale: "months",
					minScale: "days",
					itemsPerPage: 10,
					onItemClick: function(data) {
						alert("Item clicked - show some details");
					},
					onAddClick: function(dt, rowId) {
						alert("Empty space clicked - add an item!");
					},
					onRender: function() {
						if (window.console && typeof console.log === "function") {
							console.log("chart rendered");
						}
					}
				});

				$(".gantt").popover({
					selector: ".bar",
					title: "I'm a popover",
					content: "And I'm the content of said popover.",
					trigger: "hover"
				});

				prettyPrint();

			});

		</script>
		<!-- //status -->
		<script src="<?php echo base_url(); ?>assets/backend/js/sweetalert.min.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>