<div class="row">
				<div class="col-md-3" style="margin-left:10vh;">
					<div class="panel panel-default">
						<div class="panel-heading" style="text-align: center;"><h4><b>Attendance</b></h4></div>
						<div class="panel-body" style=" min-height:80vh; max-height:80vh; overflow-y: scroll;">

							 <?php
							 		
							 		$attendance = $GLOBALS['database']->SELECT_STMT("attendance");
							 		foreach ($attendance as $row) {
							 			$person = $GLOBALS['database']->SELECT_STMT("employeedetails", " WHERE Id=".$row["EMPLOYEEID"]);

							 			foreach ($person as $key) {
							 				$ppp = $key['FIRSTNAME']." ".$key['LASTNAME'];
							 			}
							 			echo "<div class=\"list-group\">";
							 			echo"<h4 class=\"list-group-item-heading\" id=\"username-attend\">".$ppp."<span class=\"badge\" id=\"events-badge\">".$row["DATE"]."</span></h4></div>";
						 			}
						 		?>
						</div>
						
					</div>
				</div>
		
			
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading" style="text-align: center;"><h4><b>New User</b></h4></div>
						<div class="panel-body" style=" min-height:55vh; max-height:55vh;">
								<form>
									<div class="input-group" style="padding-bottom: 2%; ">
										<span class="input-group-addon" id="basic-addon"><span class="glyphicon glyphicon-text-background" aria-hidden="true"></span></span>
							  			<input type="text" class="form-control" placeholder="Name" id="" >
									</div>
									<div class="input-group" style="padding-bottom: 2%; ">
										<span class="input-group-addon" id="basic-addon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></span>
							  			<input type="text" class="form-control" placeholder="Address" id="" >
									</div>
									<div class="input-group" style="padding-bottom: 2%; ">
										<span class="input-group-addon" id="basic-addon">@</span>
							  			<input type="text" class="form-control" placeholder="Email" id="" >
									</div>
									<div class="input-group" style="padding-bottom: 2%; ">
										<span class="input-group-addon" id="basic-addon"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span></span>
							  			<input type="text" class="form-control" placeholder="Contact" id="" >
									</div>
									<div class="input-group" style="padding-bottom: 2%; ">
										<span class="input-group-addon" id="basic-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
							  			<input type="text" class="form-control" placeholder="Username" id="" >
									</div>
									<div class="input-group" style="padding-bottom: 2%; ">
										<span class="input-group-addon" id="basic-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
							  			<input type="text" class="form-control" placeholder="Password" id="" >
									</div>

									<button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  ADD </button>
								</form>	
						</div>
						
					</div>
				</div>
			
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading" style="text-align: center;"><h4><b>Employee Info</b></h4></div>
						<div class="panel-body" style=" min-height:80vh; max-height:80vh; overflow-y: scroll;">
								<?php
							 		
							 		$employeedetails = $GLOBALS['database']->SELECT_STMT("employeedetails");
							 		foreach ($employeedetails as $row) {
							 			echo "<div class=\"list-group\">";
							 			echo"<h6 class=\"list-group-item-heading\" id=\"employeeID-info\" style=\"font-weight:bold;\">".$row["FIRSTNAME"]." ".$row["LASTNAME"]." </h6>";
							 			echo"<h6 class=\"list-group-item\" id=\"employeeID-info\">".$row["ADDRESS"]." </h6>";
							 			echo"<h6 class=\"list-group-item\" id=\"employeeID-info\">".$row["EMAIL"]." </h6>";
							 			echo"<h6 class=\"list-group-item\" id=\"employeeID-info\">".$row["CONTACT NO"]." </h6>";
							 			echo"<h6 class=\"list-group-item\" id=\"employeeID-info\">".$row["CATEGORY"]." </h6></div>";
						 			}
						 		?>
							 
						</div>
						
					</div>
				</div>
		</div>