<?php
require_once "connect_db.php";

if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_GET['add']))) {
    $data = json_encode($_POST);
    $data = json_decode($data);


 for ($i=0;$i < count($data);$i++){
      $name = mysqli_real_escape_string($db, $data->name);
      $description = mysqli_real_escape_string($db, $data->description);
      $date = mysqli_real_escape_string($db, $data->date);

      $sql = "INSERT INTO todo (name,description,date) VALUES ('". $name . "','" . $description ."','" . $date . "');";

        $result = $db->query($sql);
 }

} else if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_GET['delete']))) {

  $delete_name = $_POST['name'];

  $sql = "DELETE FROM todo WHERE name='{$delete_name}' LIMIT 1;";
      $result = $db->query($sql);
  // }
} else if (($_SERVER['REQUEST_METHOD'] == 'GET') && (isset($_GET['list']))) {
      $sql = "SELECT * FROM todo ORDER BY date DESC";
      $result = $db->query($sql);
      $emparray = array();

      while($row = mysqli_fetch_assoc($result))
      { $emparray[] = $row; }

      echo json_encode($emparray);

}








































// if ($_SERVER['REQUEST_METHOD'] == 'POST') {


//   // Insert data
//   if ($_GET['add'] == 1) {
//     $data = json_encode($_POST);
//     $data = json_decode($data);

//     for ($i=0;$i < count($data);$i++){
//       $name = $data->name;
//       $description = $data->description;
//       $date = $data->date;

//       $sql = "INSERT INTO todo (name,description,date) VALUES ('". $name . "','" . $description ."','" . $date . "');";

//         $result = $db->query($sql);
//     }
//   } 
//   else if ($_GET['delete'] == 1) {

//       $data = json_encode($_POST);
//       $data = json_decode($data);

//       $name = $data->name;

//       $sql = "DELETE FROM todo WHERE name='.$name.'";

//       $result = $db->query($sql);
//   }

// } if ($_SERVER['REQUEST_METHOD'] == 'GET') {

//     if (isset($_GET['list'])) {
//       $sql = "SELECT * FROM todo ORDER BY date DESC";
//       $result = $db->query($sql);
//       $emparray = array();

//       while($row = mysqli_fetch_assoc($result))
//       { $emparray[] = $row; }

//       echo json_encode($emparray);

//       }
// }













?>