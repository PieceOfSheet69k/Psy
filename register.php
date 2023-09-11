<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="register.php" method="POST">

        <?php
            @include 'db.php';
            session_start();

            if (isset($_POST['register'])) {
                $name = $_POST['name'];
                $birthday = $_POST['birthday'];
                $course = $_POST['course'];
                $email = $_POST['email'];

                $select = "SELECT * FROM users WHERE Name = '$name' && Birthday = '$birthday' && Course = '$course' && Email = '$email' ";

                $result = mysqli_query($conn, $select);

                if(mysqli_num_rows($result) > 0){
                    $error = 'user already exist';
                    echo '<span class= "error-msg">'.$error.'</span>';                    
                }
                else{
                    $insert = "INSERT INTO users(Name,Birthday,Course,Email) values('$name','$birthday','$course','$email')";
                    mysqli_query($conn, $insert);
                    header('location:login.php');
                }
            }

        ?>
        

        <h1>REGISTRATION</h1>
           
                <label for="Fullname">Enter Fullname</label>
                <input type="text" name="name" placeholder="Name" required>
          

            
                <label for="birthday">Enter Birthday</label>
                <input type="date" name="birthday" placeholder="Birthday" required>
            

            
                <label for="course">Enter Course</label>
                <input type="text" name="course" placeholder="Course" required>
          

            
                <label for="email">Enter Email</label>
                <input type="email" name="email" placeholder="Email" required>

                <input type="reset" name="reset" placeholder="Clear">
            
                <input type="submit" name="register" value="Register" required>

                <p>Already have an account click <a href="login.php">Log in</a></p>
           
        </form>
    </div>
</body>
</html>