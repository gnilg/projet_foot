<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class="form-container w-450" 
              action="php/login.php" 
              method="post">
            <h4 class="display-4 fs-1">LOGIN</h4><br>
            <?php if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label class="form-label">User name</label>
                <input type="text" 
                       class="form-control"
                       name="uname"
                       value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" 
                       class="form-control"
                       name="pass">
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="index.php" class="link-secondary">Sign Up</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7/z25hU/WNJnWdRv9Pq/hQ/MHLJImSw+Q4FA2z/q7N2u59f3sGYlglvxFwYD3gjr" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9Ohygk5D4dFhTbB8r/sM6jvtt6i3xm0pboDF6ZQrBjT6JVuBcH9jum3" crossorigin="anonymous"></script>
</body>
</html>
