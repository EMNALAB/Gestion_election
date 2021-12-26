<?php
   require('../connection.php');
   
   // retrieving candidate with the states
   if (isset($_POST['Submit'])){   
   
     $state_name = addslashes( $_POST['state_name'] );
     
       $results = mysqli_query($con, "SELECT * FROM candidates where candidate_state='$state_name'");
   	// for the first candidate name and vote
       $row1 = mysqli_fetch_array($results); 
   	// for the second candidate
       $row2 = mysqli_fetch_array($results); 
         if ($row1){
   		  $candidate_name_1=$row1['candidate_name'];
   		  $candidate_1=$row1['candidatevotes'];
         }
   
         if ($row2){
   		  $candidate_name_2=$row2['candidate_name'];
   		  $candidate_2=$row2['candidatevotes'];
         }
   }
       else
   
   ?> 
<?php
   // retrieving allstates sql query
   $allstates=mysqli_query($con, "SELECT * FROM states");
   ?>
<?php
   session_start();
   //If invalid session then redirected to login panel
   if(empty($_SESSION['admin_id'])){
    header("location:index.php");
   }
   ?>
<?php if(isset($_POST['Submit'])){
   $totalvotes=$candidate_1+$candidate_2;} ?>
<!DOCTYPE html>
<html>
   <head>
      <link href="styles.css" rel="stylesheet">
      <script language="JavaScript" src="js/admin.js"></script>
   </head>
   <body>
      <div  class="res-div2">
         <div class= "menu">
            <center>
           <h1> <img src="images/Election-Vote-2-icon.png"  width=7%  ></img> </h1>
               <a class="a_link" href="refresh.php" >Statistiques</a>
               <a class="a_link" href="states.php">États</a> 
               <a class="a_link" href="candidates.php">Candidates</a> 
               <a class="a_link" href="managedata.php"> Comptes</a> 
               <a class="a_link" href="pwchange.php">Gerer mot de passes</a>  
               <a class="a_link" href="logout.php">Logout</a>
            </center>
            <br>
         </div>
         <div>
            <table width="420" align="center">
               <form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return stateValidate(this)">
                  <tr>
                     <div class="input-group mb-3">
                        <div class="select-titre">
                           <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select class="custom-select" style="width:200px;">
                           <option VALUE="select">selectionner</option>
                           <?php 
                              //while loop through all table rows
                              while ($row=mysqli_fetch_array($allstates)){
                              echo "<OPTION VALUE=$row[statename]>$row[statename]";
                              }
                              ?>
                        </select>
                     </div>
                     <div class="select-titre">
                        <label class="input-group-text" for="inputGroupSelect01">Choisir l'États</label>
                     </div>
                     <td><input type="submit" name="Submit" value="Voir les Resultats" class="btn" />
                     </td>
                  </tr>
               </form>
            </table>
            <center>
            <div style="    width: 50%;
               margin-top: 20px;
               background-color: #567dd01f;">
               <?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>:<br>
               <img src="images/candidate-1.gif"
                  width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>'
                  height='20'>
               <?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
               <br>This candidate vote count is <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?>
               <br>
               <br>
               <?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>:<br>
               <img src="images/candidate-2.gif"
                  width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>'
                  height='20'>
               <?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
               <br>This candidate vote count is <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?>
            </div>
         </div>
      </div>
   </body>
</html>