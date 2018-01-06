


<div style="text-align: center;"><h1 class="titlebarpersonalchat"><b>MEMO</b></h1></div>

<div class="row">
<div class="col-md-1">&nbsp;</div>
<div class="col-md-4">
      <div class="table-responsive">
<table class="table">
<caption>Memos</caption>
<thead>
      <tr>
      <th>From</th> 
      <th>Subject</th>
      <th>action</th>
      </tr>
</thead>
      <tbody>
            <?php
                   $events = $GLOBALS['database']->SELECT_STMT("memo");
                   foreach ($events as $row) {
                        $person = $GLOBALS['database']->SELECT_STMT("employeedetails","WHERE Id=".$row["SENTBY"]);
                        foreach ($person as $key) {
                              $employee=$key['FIRSTNAME']." ".$key['LASTNAME'];
                        }
                        echo "<tr>";
                        echo "<td>".$employee."</td>";
                        echo "<td>".$row["SUBJECT"]."</td>";
                        echo "<td> <button onclick=\" viewmemo(".$row["ID"].");\">View</button></td></tr>";
                  }                
            ?>
      </tbody>
</table>
</div>
</div>


<div class="col-md-6" id="divbox" style="display:;">
      <div class="panel panel-default" style="">
            <div class="panel-heading" style=" text-align:center; "><h4><b>Memo</b></h4> </div>
            <div class="panel-body" id="" style=" height:73vh;"">
                  
                  <div id="DetailMemo">
                        <table>
                              <tr>
                                   <td>BY:</td> 
                                   <td>&nbsp;</td> 
                              </tr>
                               <tr>
                                   <td>Subject:</td> 
                                   <td>&nbsp;</td> 
                              </tr>
                              <tr>
                                   <td>Body:</td> 
                                   <td>&nbsp;</td> 
                              </tr>
                              <tr>
                                          <td colspan=2>&nbsp;</td>
                              </tr>
                              <tr>
                                          <td colspan=2>&nbsp;</td>;
                              </tr>
                        </table>
                        <hr>            
                  </div>      
            </div>
      </div>      
</div>
</div>

<script>
     
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

function viewmemo(id) {
      if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {     
                document.getElementById("DetailMemo").innerHTML=this.responseText;
            }
        };
            xmlhttp.open("GET", "?Request=13&Ajax=1&NO="+id, true);
        xmlhttp.send();
}
</script>      