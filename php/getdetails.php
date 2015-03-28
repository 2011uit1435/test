<?php
$selected_city = $_POST['selected_city'];
$selected_area = $_POST['selected_area'];
$selected_hobby = $_POST['selected_hobby'];
if($selected_city != "" && $selected_area != "" && $selected_hobby != "") {
    
    $con = mysqli_connect('localhost','root','','');
   
    if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
  }
    
   mysqli_select_db($con,"hobby"); 
    
    $selected_area = "'".$selected_area."'";
    
    $sql="SELECT * FROM ".$selected_hobby. " where Area = ".$selected_area;
    $result = mysqli_query($con,$sql);
    
    while($row = mysqli_fetch_array($result))
  {
 //   echo '<img height="200" width="200" id="show_image" src="data:data:image/png;base64,' . base64_encode($row['Image']) .'"/>';
        
        $response = json_encode(array('name' => $row['Name'], 'Image' => base64_encode($row['Image']), 'Mobile_Number' => $row['Mobile_Number'], 'Address' => $row['Address'], 'Area' => $row['Area'] ));
 
      echo $response;  
  
  }
    
    if(!$row){
printf(" %s\n", mysqli_error($con));
    exit();
}

mysqli_close($con);
}
?>
