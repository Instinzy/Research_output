<?php
session_start();
include 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="home.html" class="logo">Educa.</a>


      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name">ADMINISTRATION</h3>
         <p class="role">student</p>
         <div class="flex-btn">
            <a href="logout.php" class="option-btn">LOGOUT</a>
     
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="images/pic-1.jpg" class="image" alt="">
      <h3 class="name">ADMINISTRATION</h3>
      <p class="role">admin</p>
   </div>

   <nav class="navbar">
      <a href="home.html"><i class="fas fa-home"></i><span>USER</span></a>
   </nav>

</div>

<section class="home-grid">

   <h1 class="heading">ADMINITRATION PANEL - USER</h1>

   
<?php
$user = null;

if (isset($_POST['search'])) {
    $email = $_POST['email'];
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
    $picture = null;

    // Handle file upload
    if (!empty($_FILES['picture']['name'])) {
        $target_dir = "uploads/";
        $picture = $target_dir . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $picture);
    }

    // Update query
    $sql = "UPDATE register SET name=?, email=?";
    if ($password) {
        $sql .= ", password=?";
    }
    if ($picture) {
        $sql .= ", picture=?";
    }
    $sql .= " WHERE id=?";

    $stmt = $conn->prepare($sql);
    if ($password && $picture) {
        $stmt->bind_param("ssssi", $name, $email, $password, $picture, $id);
    } elseif ($password) {
        $stmt->bind_param("sssi", $name, $email, $password, $id);
    } elseif ($picture) {
        $stmt->bind_param("sssi", $name, $email, $picture, $id);
    } else {
        $stmt->bind_param("ssi", $name, $email, $id);
    }

    if ($stmt->execute()) {
        echo "User updated successfully.";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM register WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "User deleted successfully.";
        $user = null; // Reset form after deletion
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}
?>


<section class="form-container">

<form method="POST">
<h2>Search User by Email</h2>
    <input type="email" name="email" required class="box" placeholder="Enter Email" >
    <button type="submit" name="search" class="btn">Search</button>
</form>


<?php if ($user): ?>
  
    <form method="POST" enctype="multipart/form-data">
	  <h2>Edit User</h2>
        <input type="hidden" name="id" required class="box" value="<?= $user['Id'] ?>">
        <label>Name:</label>
        <input type="text" name="name" required class="box" value="<?= $user['Name'] ?>" ><br>
        <label>Email:</label>
        <input type="email" name="email" required class="box" value="<?= $user['Email'] ?>"><br>
		<label>Password</label>
        <input type="name" name="password" required class="box" value="<?= $user['Password'] ?>"><br>
		
        <label>Profile Picture:</label>
        <input type="file" name="profile_picture" class="btn"><br>
        <?php if ($user['picture']): ?>
            <img src="<?= $user['picture'] ?>" width="150" height="150"><br>
        <?php endif; ?>
        <button type="submit" name="update" class="btn">Update</button>
        <button type="submit" name="delete" class="btn" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
<?php endif; ?>
      <br>

     

     

   </div>

</section>



















<footer class="footer">

   &copy; copyright @ 2022 by <span>mr. web designer</span> | all rights reserved!

</footer>

<!-- custom js file link  -->
<script src="js/script.js"></script>

   
</body>
</html>