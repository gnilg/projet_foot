<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            background-image: url('https://img.freepik.com/photos-premium/vue-panoramique-stade-football-vide-par-journee-ensoleillee-champ-vert-lignes-blanches-ciel-bleu-nuages-blancs_1187703-58816.jpg?size=626&ext=jpg&ga=GA1.1.1208765684.1717925982&semt=sph');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class="form-container shadow w-450 p-3" 
              action="php/signup.php" 
              method="post">
            <h4 class="display-4 fs-1">Create Account</h4><br>
            <?php if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <?php if(isset($_GET['success'])){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" 
                       class="form-control"
                       name="fname"
                       value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" 
                       class="form-control"
                       name="uname"
                       value="<?php echo isset($_GET['uname']) ? $_GET['uname'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" 
                       class="form-control"
                       name="pass">
            </div>
            
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <a href="login.php" class="link-secondary">Login</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7/z25hU/WNJnWdRv9Pq/hQ/MHLJImSw+Q4FA2z/q7N2u59f3sGYlglvxFwYD3gjr" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9Ohygk5D4dFhTbB8r/sM6jvtt6i3xm0pboDF6ZQrBjT6JVuBcH9jum3" crossorigin="anonymous"></script>
</body>
</html>
