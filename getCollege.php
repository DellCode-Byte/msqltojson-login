<?php
   $servername='localhost';
   $username='root';
   $password='';
   $dbname = "bulsu_sims";

   $con = mysqli_connect($servername,$username,$password,$dbname);

   $sql = "CALL getAllCollege();";
   $emparray = array();

   if($result=mysqli_query($con,$sql)){
        echo"success";
         while($row = mysqli_fetch_assoc($result)){

           $emparray[] = $row;
           
         }
        //display on browser 
        echo"<pre>";
        print_r($emparray);
        //write in json file
        $fp = fopen('college.json', 'w');
        fwrite($fp, json_encode($emparray));
        fclose($fp);
   }


   if(!$con){
      die('Could not Connect My Sql:' .mysql_error());
   }

?>