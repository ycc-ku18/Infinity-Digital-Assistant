<div class="row">
		<div class="col-md-4" style=" padding-left: 5%;">
			<div class="panel panel-default" style="margin-top: 5vh; ">
				 <div class="panel-heading""><h4 id="headinng"><b>Upcoming Events</b></h4></div>
				 <div class="panel-body" style=" min-height:60vh; max-height:60vh;">
				 	<?php
				 	$now= new DateTime(); 
				 	$where="WHERE DATETIME >= '".$now->format('Y-m-d H:i:s')."'";
					$events = $GLOBALS['database']->SELECT_STMT("events", $where);
							 		foreach ($events as $row) {
							 			echo "<ul class=\"list-group\">";
							 			echo"<li class=\"list-group-item\">".$row["EVENTNAME"]." </li></ul>";
						 			}
				?>
				 </div>
				 
			</div>	 
		</div>

		<div class="col-md-4" >
			<div class="panel panel-default" style="margin-top: 5vh;">
				 <div class="panel-heading"><h4 id="headinng"><b>latest Memos</b></h4></div>
				 <div class="panel-body" style=" min-height:60vh; max-height:60vh;">
				 	<?php
					$memo = $GLOBALS['database']->SELECT_STMT("memo");
							 		foreach ($memo as $row) {
							 			echo "<ul class=\"list-group\">";
							 			echo"<li class=\"list-group-item\">".$row["SUBJECT"]." </li></ul>";
						 			}
				?>
				 </div>
				
			</div>	 
		</div>

		<div class="col-md-3" style=" padding-right: : 5%;">
			<div class="panel panel-default" style="margin-top: 5vh;">
				 <div class="panel-heading"><h4 id="headinng"><b>Upcoming Meetings</b></h4></div>
				 <div class="panel-body" style=" min-height:60vh; max-height:60vh;">
				 	
				<?php
					$now = date("Y/m/d").date("h:i:sa");
					 $now;
					$where="WHERE DATETIME >= '".$now."'";
					$meeting = $GLOBALS['database']->SELECT_STMT("meeting", $where );
							 		foreach ($meeting as $row) {
							 			echo "<ul class=\"list-group\">";
							 			echo"<li class=\"list-group-item\">".$row["SUBJECT"]."</li>";
							 			echo"<li class=\"list-group-item\">".$row["DATETIME"]." </li></ul>";
						 			}
				?>
				 </div>
				 
			</div>	 
		</div>
	</div>