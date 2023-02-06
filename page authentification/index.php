<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/icon2.png" type="image/x-icon">

  <link rel="stylesheet" href="./styles.css" />
  <title>Quizzeo</title>



</head>

<body>
  <main class="flex align-items-center justify-content-center">
    <section id="mobile" class="flex"></section>
    <section id="auth" class="flex direction-column">
      <div class="panel login flex direction-column">
        <h1 title="Quizzeo" class="flex justify-content-center">
          <img src="img/Capture d'écran_20230206_113319.png" alt="Quizzeo logo" title="Quizzeo logo" width="175" />
        </h1>
        <form id="login_form" action="verification.php" method="post">
          <label for="email" class="sr-only">username</label>
          <input type="text"  placeholder="username" name="login_email" required>

          <label for="password" class="sr-only">Password</label>
          <input name="login_password" type="password" placeholder="Password" required>

          <input  type="submit" id="login_button" value="Log in" disabled>
        </form>
        <div class="flex separator align-items-center">
          <span></span>
          <div class="or">OR</div>
          <span></span>
        </div>
      <div class="panel register flex justify-content-center">
        <p>Don't have an account? </p>
        <a href="index2.php">Sign up</a>
      </div>
    </ul>
    <?php
    if(isset($_GET['erreur'])){
      $err = $_GET['erreur'];
    if($err==1 || $err==2)
      echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
    }
    ?>
  </footer>
</body>

</html>