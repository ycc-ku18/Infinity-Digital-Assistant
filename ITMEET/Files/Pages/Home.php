<?php 
	//require_once PAGES."chatbot.php";
?>

<?php 

//conference Chat

?>
<!--<style>
	#current_recept{
		background-color: red;
	}
</style>
<div class="row" id="Bipin" data=1>
	<div class="col-sm-3">
	</div>
	<div class="col-sm-6">
		<div id="messanger">
			<form class="form-horizontal login_board" role="form" method="get" action="">
				<input type="hidden" name="Request" value="4">
				<input type="hidden" name="Ajax" value="0">
				<input type="hidden" name="UserId" value="" id="UserId"> 
				<div id="current_recept">
				</div>
				<div id="conversation"></div>
				<br>
				<textarea name="Message" id="Message"></textarea>
				<input type="button" id="Sender" value="Send">
			</form>
		</div>
	</div>
	<div class="col-sm-3">
		<ul>
		<?php 
			/*$users_Table=$GLOBALS['database']->SELECT_STMT("employeedetails", "", array('Id','FirstName','LastName'));
			foreach ($users_Table as $row){
				echo "<li><a href=\"#\" onclick=\"contact_choose(this);\" UserName= \"".$row['FIRSTNAME']."\" UserId=\"".$row['ID']."\">".$row['FIRSTNAME']."</a></li>";
			}*/
		?>
		</ul>
	</div>
</div>

<script type="text/javascript">
	xmlhttp ='';
    function XMLReq(){
        if (window.XMLHttpRequest || window.ActiveXObject) {
            if (window.ActiveXObject) {
                try {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                } catch(exception) {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
            } else {
              xmlhttp = new XMLHttpRequest(); 
            }
            return xmlhttp;
        } else {
            alert("Your browser does not support XMLHTTP Request");
        }      
    }

	function contact_choose(CID){
		document.getElementById("UserId").value = CID.getAttribute("UserId");
		document.getElementById("current_recept").innerHTML = CID.getAttribute("UserName");
		document.getElementById("conversation").innerHTML="";
	}

	setInterval(function(){
		if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {	
                document.getElementById("conversation").innerHTML=this.responseText;
        };
        var to = document.getElementById("UserId").value;
		xmlhttp.open("GET", "?Request=5&Ajax=1&UserId="+to, true);
        xmlhttp.send();
	},1000);



    document.getElementById("Sender").addEventListener("click",function(e){
        $Sender=document.getElementById("Sender");
        if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $inputArray = this.responseText;	
                if ($inputArray==1)
                	console.log("Ok");
                else if ($inputArray==-1)
                	alert ("Error");
             }
        };
        var to = document.getElementById("UserId").value;
        var Message = document.getElementById("Message").value;
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
        xmlhttp.open("GET", "?Request=4&Ajax=1&UserId="+to+"&DateTime="+dateTime+"&Message="+Message, true);
        xmlhttp.send();
    });

</script>-->
 <!--   <nav class="navbar navbar-inverse" role="navigation" style="border-radius:0px;" >
         <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse"
                 data-target="#navbar-collapse">
             </button>
             <a class="navbar-brand" id="Infinity" style="text-align: center;" href="#">INFINITY</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
             <ul class="nav navbar-nav">
                 <li class="active"><a href="#">Home</a></li>
                 <li><a href="#">Notification</a></li>
                    <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Chat <b class="caret"></b></a>
                     <ul class="dropdown-menu">
                         <li><a href="#">Personal Chat</a></li>
                         <li><a href="#">Conference Chat</a></li>
                    </ul>
                </li>   
                
             </ul>
    
            <div class="btn-group" style= "float:right; padding-top:0.75%; ">
                    <button type="button" class="btn dropdown-toggle"data-toggle="dropdown"><a>Signed in as </a>Infinity
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Log Out <span class="glyphicon glyphicon-log-out"></span></a></li>
                        <li class="divider"></li>
                        <li><a href="#">Settings  <span class="glyphicon glyphicon-cog"></span></a></li>
                   </ul>
            </div>  

         </div>
    </nav>-->
<style type="text/css">

    .messages{
        margin-bottom: 15px;
        position: relative;   
        min-height: 20px;
        width:100%;
        display: inline-block; 
    }

    .chatSender{
        margin-right:15px; 
        text-align: right;
        word-wrap: break-word;
    }
    .chatReciever{
        margin-left: 15px;
        text-align: left;
        word-wrap: break-word;
    }

    .chatSender >.mess{
        max-width: 55%;
        clear: right;
        float: right;
        word-wrap: break-word;   
        background-color:rgba(0, 100, 240, 1);    
        padding: 5px;   
        border-radius: 10px;
    }
    .chatReciever >.mess{
        max-width: 55%;
        clear: left;
        float: left;
        word-wrap: break-word;   
        background-color:rgba(0, 100, 240, 0.2); 
        padding: 5px;   
        border-radius: 10px;
    }
    .RecieverMsg{
        word-wrap: break-word;
        color:black;
    }
    .SenderMsg{
        word-wrap: break-word;
        color:white;
    }
    .ChoiceUl{

    }
    .ChoiceLi{

    }
</style>
    <div class="row" style="margin-top: 4vh; ">
        <div class="col-md-3" style="padding-left: 3%;" >
            <div class="panel panel-default" >
                <div class="panel-heading"><h4 id="DashBoard"><b>DashBoard</b></h4></div>
                <div class="panel-body" style="max-height:35vh; min-height:35vh; ">
                  <ul class="list-group">
                    </br>
                     <li class="list-group-item">Events <span class="badge" id="events-badge">30</span></li>
                     <li class="list-group-item">Memos <span class="badge" id="memo-badge">40</span></li>
                     <li class="list-group-item">Message <span class="badge" id="msg-badge">50</span></li>
                 </ul>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading" style=" text-align:center; "><h4 id="Bot-heading"><b>ChatBot</b></h4> </div>

                <div style="margin-top: 25px;">
                <div class="panel-body" id="ChatBot" style=" height:67vh;"">
                    <?php //require_once PAGES."chatbot.php";?>
                        <div id="chatBotOutput" style="position: absolute;top: 15%; width:93%;height:75%;overflow-y: scroll;">
                        </div>


                </div>
        <div class="input-group" style="position: absolute;bottom:0%; width:95.5%;">
            <!--<nav class="navbar navbar-inverse" role="navigation"> 
               <div> 
                  <ul class="nav navbar-nav"> 
                     <li><a href="#" data-id="1">Events</a></li> 
                     <li><a href="#" data-id="2">SVN</a></li> 
                     <li><a href="#" data-id="3">SVN</a></li> 
                     <li><a href="#" data-id="4">SVN</a></li> 
                     <li><a href="#" data-id="5">SVN</a></li> 
                     <li><a href="#" data-id="6">SVN</a></li> 
                     <li><a href="#" data-id="7">SVN</a></li> 
                     <li><a href="#" data-id="8">SVN</a></li> 
                     <li><a href="#" data-id="9">SVN</a></li> 
                     <li><a href="#" data-id="10">SVN</a></li> 
                     <li><a href="#" data-id="11">SVN</a></li> 
                  </ul> 
               </div> 
            </nav> -->
            <input type="text" name="chatBotInput" id="chatBotInput" class="form-control">
        </div>
                    </div>
            </div>
        </div>
    

        <div class="col-md-3" style="padding-right: 3%;">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 id="Schedule"><b>Schedule</b></h4></div>
                <div class="panel-body" style="max-height: 35vh; min-height: 35vh;">
                  <?php
                    $schedule = $GLOBALS['database']->SELECT_STMT("schedule");
                    foreach ($schedule as $row) {
                       echo"<div class=\"list-group\">";
                       echo"<h5 class=\"list-group-item\">".$row["INFO"]."<span class=\"badge\">".$row["DATE"]."</span></h5></div>";
                       
                    }
                 ?>
                </div>
            </div>
        </div>


    


<script>

    function chatplacer(msg, sender=false){
        var divmessage = document.createElement("div");
        var div1 = document.createElement("div");
        var div2 = document.createElement("div");
        var span1 = document.createElement("span");

        //var rand = parseInt(Math.random()*1000);
        //div.id=rand;
        divmessage.classList="messages";
        if (sender==true){
            div1.classList="chatSender";
            div2.classList="mess";
            span1.classList="SenderMsg";
            span1.innerHTML = msg;
            div2.appendChild(span1);
            div1.appendChild(div2);
        } else {
            div1.classList="chatReciever";
            div2.classList="mess";
            span1.classList="RecieverMsg";
            span1.innerHTML = msg;
            div2.appendChild(span1);
            div1.appendChild(div2);
        }
        divmessage.appendChild(div1);
        document.getElementById("chatBotOutput").appendChild(divmessage);
    }
    function ListPlacer(array){
        var ul = document.createElement("ul");
        ul.classList = "ChoiceUl";
            var string="";
            for (var count = 0; count<array.length; count++){
                string+="<li class=\"ChoiceLi\"><button class=\"btn btn-danger\" onclick=\"ChatbotAnswer();\" data-id=\""+array[count][0]+"\">"+ array[count][1]+"</btn></li>";
            }
        ul.innerHTML = string;
        speak(string);
        document.getElementById("chatBotOutput").appendChild(ul);
    }

    function speak(string){
        var sound = new SpeechSynthesisUtterance();
        sound.voice = speechSynthesis.getVoices().filter(function(voice){return voice.name == "Agnes";})[0];
        sound.text = string;
        sound.lang = "en-US";
        sound.volume = 1; //1-0
        sound.rate = 1;
        sound.pitch = 1; //2-0
        speechSynthesis.speak(sound);
    }
    
    (function(){
        var chatBotInput=document.getElementById("chatBotInput");
        chatBotInput.addEventListener("keypress",function(e){
            var whichkey = e.which || e.keyCode;
            if (whichkey==13){
                chatplacer(chatBotInput.value,true);
                getChatbotAnswer(chatBotInput.value);
            }
        });

        function getChatbotAnswer(question) {
            var xhttp;
            if (question.length == 0) {
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    chatplacer(this.responseText);
                    speak(this.responseText);
                    //speak(this.responseText);
                }
            };
            xhttp.open("GET", "chatb.php?question="+question, true);
            xhttp.send();   
        }

        function init(){
            chatplacer("Welcome To Infinity");
            speak("Welcome To Infinity");
            setTimeout(function(){speak("A digital World")},2000)
             xhttp = new XMLHttpRequest();
            xhttp.open("GET", "chatb.php?clearall=1", true);
            xhttp.send();
            //ListPlacer(Array(Array(1,"Make New Events"),Array(2,"View Events"),Array(3,"sdf")));

        }
        init();
    })();

      


    /**/
</script>