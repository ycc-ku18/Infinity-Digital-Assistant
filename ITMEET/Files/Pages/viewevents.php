
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-7">
				<div class="panel panel-default" style="margin-left:1%; ">
				<div class="panel-heading""><h4 id="DashBoard"><b>Events</b></h4></div>
				<div class="panel-body">
					<div class="table-responsive">
					 <table class="table">
						 <caption>Upcoming Events</caption>
						 <thead>
							 <tr>
							 <th>Name</th>
							 <th>Date&time</th>
							 <th>Place</th>
							 <th>Info</th>
							 </tr>
						 </thead>
						 <tbody>
						 	<?php
						 		$now = new DateTime();
						 		$where = "WHERE DATETIME >= '".$now->format('Y-m-d H:i:s')."'";
						 		$events = $GLOBALS['database']->SELECT_STMT("events", $where);
						 		foreach ($events as $row) {
						 			echo "<tr>";
						 			echo "<td>".$row["EVENTNAME"]."</td>";
						 			echo "<td>".$row["DATETIME"]."</td>";
						 			echo "<td>".$row["PLACE"]."</td>";
						 			echo "<td>".$row["INFO"]."</td>";
						 			echo "</tr>";
						 		}
						 	?>
						 </tbody>
					 </table>

					 <div class="table-responsive">
					 <table class="table">
						 <caption>Old Events</caption>
						 <thead>
							 <tr>
							 <th>Name</th>
							 <th>Date&time</th>
							 <th>Place</th>
							 <th>Info</th>
							 </tr>
						 </thead>
						 <tbody>
						 	<?php
								$now = new DateTime();
						 		$where = "WHERE DATETIME < '".$now->format('Y-m-d H:i:s')."'";
						 		$events = $GLOBALS['database']->SELECT_STMT("events", $where);
						 		echo $GLOBALS['database']->error_message();
						 		foreach ($events as $row) {
						 			echo "<tr>";
						 			echo "<td>".$row["EVENTNAME"]."</td>";
						 			echo "<td>".$row["DATETIME"]."</td>";
						 			echo "<td>".$row["PLACE"]."</td>";
						 			echo "<td>".$row["INFO"]."</td>";
						 			echo "</tr>";
						 		}
						 	?>
						 </tbody>
					 </table>
				</div>
				</div>
				</div>
			</div>

			</div>
			<div class="col-md-1"></div>	
		</div>
				