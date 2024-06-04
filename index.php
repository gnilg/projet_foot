<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center v-100">     
    <form class="shadow w-450 p-3" action="php/signup.php" method="post">
        <h4 class="display-6 fs-1 ">Create Your Account</h4><br>
        <?php if(isset($_GET['error'])){  ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error'] ?>
            </div>
        <?php  }; ?>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">Full name</label>
            <input type="tex" class="form-control" name="firstname" value="<?php echo (isset($_GET['firstname']))? $_GET['firstname']:"" ?> ">
        </div>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="name" class="form-control" name="username" value="<?php echo (isset($_GET['username']))? $_GET['username']:"" ?> ">
        </div>
        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>
        <a href="login.php" class="link-secondary ">login</a>
    </form>
    </div> 
</body>
</html>