<?php
    require_once "configuration.php";
    if (isset($_GET['clearall']) && $_GET['clearall']==1){
        unsetall();
        exit();
    }
?>
<?php
//session_start();
if (!isset($_SESSION['CountForSave'])){
    $_SESSION['CountForSave'] = 0;
}
    function unsetall(){
        if (isset($_SESSION["IsEvent"])){unset($_SESSION["IsEvent"]);} 
        if (isset($_SESSION["PointTo"])){unset($_SESSION["PointTo"]);}
        if (isset($_SESSION["ShouldSave"])){unset($_SESSION["ShouldSave"]);}
        if (isset($_SESSION["EventComplete"])) {unset($_SESSION["EventComplete"]);}
        for ($count=0;$count<=$_SESSION['CountForSave'];$count++) {
            $Name = "Data".$count;
            if (isset($_SESSION[$Name]))unset($_SESSION[$Name]);            
        }
        unset($_SESSION['CountForSave']);
        if (isset($_SESSION["UncompleteTask"])) {unset($_SESSION["UncompleteTask"]);}
    }
    function SaveData($data){
        $Name = "Data".$_SESSION['CountForSave'];
        $_SESSION[$Name]=$data;
        $_SESSION['CountForSave'] += 1;
    }


//$FirstTagSet = array(0=>"SEND MAIL",1=>"VIEW MESSAGE",3=>"COMPANY NAME");
/*$FirstTagAnswer = array(
    array("To whom", 1,2,1,0),
    array("of whom", 1,3,1,1),
    array("subject", 1,4,1,0),
    array("Infinity", 0,0,0,1),
    array("Message", 1,0,0,1)
);*/
$FirstTagSet = array(
array(0,"SEND MAIL"),
array(3,"VIEW MESSAGE"),
array(4,"SEND MESSAGE"),
array(6,"VIEW MEMO"),
array(7,"WRITE MEMO"),
array(9,"SCHEDULE"),
array(10,"BUILT"),
array(10,"MADE"),
array(10,"CREATED"),
array(10,"COMPANY NAME")
);

$FirstTagAnswer = array(
    array("Whom do you like to send mail to?",1,1,1,0),
    array("What is the subject of the mail?",1,2,1,0),
    array("Please write the body of the mail.",1,0,1,1),

    array("Whose message would you like to see?",1,0,1,2),

    array("Whom do you like to send your message to?",1,5,1,0),
    array("Please write your message?",1,0,1,3),
    
    array("Whose memo would you like to view?",1,0,0,1),

    array("What is the subject of the memo?",1,8,1,0),
    array("please write the message?",1,0,1,1),

    array("Please input the date you want to check your schedule for.",1,0,0,1),

    array("Team infinity",0,0,0,0)




);$eeee=0;
$question  = $_GET['question'];

if (!isset($_SESSION["UncompleteTask"])) {
        $question = strtoupper($question);
        foreach ($FirstTagSet as $aasad) {
            //echo $anskey.$value;
            $anskey=$aasad[0];
            $value=$aasad[1];
            if (strpos($question, $value) !== false) {
                $eeee+=1;
                echo $FirstTagAnswer[$anskey][0];
                if ($FirstTagAnswer[$anskey][1]!=0){
                    $_SESSION["UncompleteTask"] = 1;
                    if ($FirstTagAnswer[$anskey][2]!=0)    
                        $_SESSION["PointTo"] = $FirstTagAnswer[$anskey][2];


                    if ($FirstTagAnswer[$anskey][3]!=0)    $_SESSION["ShouldSave"] = $FirstTagAnswer[$anskey][3];
                    if ($FirstTagAnswer[$anskey][4]!=0)    $_SESSION["EventComplete"] = $FirstTagAnswer[$anskey][4];  
                    //echo "POINT TO".$_SESSION["PointTo"]."<BR>SHOULD SAVE".$_SESSION["ShouldSave"]."<BR>EVENT COMPLETE".$_SESSION["EventComplete"];    
                }


                
                break;
            }    
        }
        exit();    
} else {


    if (isset($_SESSION["ShouldSave"])){
        if ($_SESSION["ShouldSave"]!=0){
            SaveData($question);
            $eeee+=1;
        }
    }

    if (isset($_SESSION["PointTo"])){
        if ($_SESSION["PointTo"]!=""){
            $eeee+=1;
            echo $FirstTagAnswer[ $_SESSION["PointTo"] ][0];
                if ($FirstTagAnswer[ $_SESSION["PointTo"] ][1]!=0){
                    $_SESSION["UncompleteTask"] = 1;

                    if ($FirstTagAnswer[$_SESSION["PointTo"]][3]!=0)    $_SESSION["ShouldSave"] = $FirstTagAnswer[$_SESSION["PointTo"]][3];
                    if ($FirstTagAnswer[$_SESSION["PointTo"]][4]!=0)    $_SESSION["EventComplete"] = $FirstTagAnswer[$_SESSION["PointTo"]][4];
                    if ($FirstTagAnswer[$_SESSION["PointTo"]][2]!=0)    $_SESSION["PointTo"] = $FirstTagAnswer[$_SESSION["PointTo"]][2];
                    else if ($FirstTagAnswer[$_SESSION["PointTo"]][2]==0)
                        unset($_SESSION["PointTo"]);
                    exit();   
                } else {}
               
        }
    }
    if (isset($_SESSION["EventComplete"])){
        if ($_SESSION["EventComplete"]!=0){
            $eeee+=1;
            //call to EventListener
            eventtrigger($_SESSION["EventComplete"]);
            unsetall();
        }
    }
}

function eventtrigger($eventId){
    $dataCount = $_SESSION['CountForSave'];
    $eeee+=1;
    switch ($eventId) {
        case '1':
            if ($dataCount!=2){
                echo "Error Occured Reload the page and try again";
            }
            mail($_SESSION["Data0"],$_SESSION["Data1"],$_SESSION["Data2"]);
            echo "Mail Send";
            break;
        
        case '2':
            echo "Last message sent by ".$_SESSION["Data0"]." is ";
            $which = " WHERE FirstName LIKE '".$_SESSION["Data0"]."'";
            $employee=$GLOBALS['database']->SELECT_STMT("employeedetails", $which);
            $ID = 3;
            foreach ($employee as $v) {
                $ID = $v['ID'];
            }    

            //$GLOBALS['database']->SetSql("SELECT * FROM personalmessage WHERE Sender=".$ID." and Recept=".$_SESSION['UserId']." LIMIT 1");
            $where = "WHERE Sender=".$ID." and Recept=".$_SESSION['UserId']." LIMIT 1";
            $data = $GLOBALS['database']->SELECT_STMT("personalmessage", $where);
            //$GLOBALS['database']->Execute_Query();

            foreach ($data as $value) {
                echo $value['MESSAGE'];
            }
        break;

        case '3':
            $which = " WHERE FirstName LIKE '".$_SESSION["Data0"]."'";
            $employee=$GLOBALS['database']->SELECT_STMT("employeedetails", $which);
            $ID = 3;
            foreach ($employee as $v) {
                $ID = $v['ID'];
            } 
            $now = date("Y/m/d").date("h:i:sa");
            if ($GLOBALS['database']->INSERT_STMT("personalmessage",array(
                array(
                    'Sender'=>$_SESSION['UserId'],
                    'Recept'=>$ID,
                    'DateTime'=>$now,
                    'Message'=>$_SESSION["Data1"]
                )
            )))
                echo "Message send";

        break;

        default:
            exit();
            break;
    }
    //exit();
}

if ($eeee!=0)
    echo "Oops I didn't get you";
//unset($_SESSION['UserId']);
//$words = explode(" ", $question);
//echo $words[0];
//echo $words[1];
//$value = str_replace("#", "",$value);
?>