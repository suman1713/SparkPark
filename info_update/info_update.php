<?php
include 'connection.php'; 
   if (isset($_GET['user'])) {
   $user = $_GET['user'];
   $get_user = $mysqli->query("SELECT * FROM users WHERE username = '$user'");
   $user_data = $get_user->fetch_assoc();
    } else {
    header("Location: index.php");
    }?>
<!DOCTYPE html>
<html>
    <head>  
 <meta charset="UTF-8">
 <title><?php echo $user_data['username'] ?>'s Profile Settings</title>
    </head> 
 <body>        <a href="index.php">Home</a> | Back to <a href="profile.php?user=<?php echo $user_data['username'] ?>"><?php echo $user_data['username'] ?></a>'s Profile        
 <h3>General</h3> 
        <form method="post" action="update-profile-action.php?user=<?php echo $user_data['username'] ?>">            
          <label>Name:</label><br> 
          <input type="text" name="fullname" value="<?php echo $user_data['full_name'] ?>" /><br> 
          <label>Email:</label><br> 
          <input type="text" name="email" value="<?php echo $user_data['email'] ?>" /><br> 
          <label>Description:</label><br>
          <input type="text" name="description" value="<?php echo $user_data['description'] ?>" /><br> 
          <label>Password:</label><br> 
          <input type="text" name="password" value="<?php echo $user_data['password'] ?>" /><br>
          <label>Phone:</label><br>          
          <input type="submit" name="Submit" value="Submit" />        
 </form>   
<?php
  include 'connection.php';
    if (isset($_POST['update_profile'])) {
 $user = $_GET['user'];
 $fullname = $_POST['fullname'];
 $description = $_POST['description'];
 $gender = $_POST['gender'];
 $address = $_POST['address'];
 $update_profile = $mysqli->query("UPDATE users SET full_name = '$fullname',
                      description = '$description', password = md5($password), phone = '$phone'
                      WHERE username = '$user'");
     if ($update_profile) {
    header("Location: profile.php?user=$user");
     } else {
   echo $mysqli->error;
     }
 }
?>
  
 </body>
</html>