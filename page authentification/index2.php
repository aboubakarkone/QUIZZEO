<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/icon2.png" type="image/x-icon">

  <link rel="stylesheet" href="./styles.css" />
  <title>Sign up</title>

  <script src="action.js"></script>

</head>

<body>
  <main class="flex align-items-center justify-content-center">
    <section id="mobile" class="flex"></section>
    <section id="auth" class="flex direction-column">
      <div class="panel login flex direction-column">
        <h1 title="sign up" class="flex justify-content-center">
          <img src="img/Capture d'écran_20230206_113319.png" alt="Quizzeo logo" title="Quizzeo logo" width="175" />
        </h1>
        <form id="login_form" action="user_data.php" method="post">
          <label for="username" class="sr-only">username</label>
          <input id="username*" type="text" name="username"
            placeholder="username" />

        <form id="login_form" action="user_data.php" method="post">
          <label for="date" class="sr-only">date of birth</label>
          <input id="date" type="date" name="date"
            placeholder="date of birth" />

        <form id="login_form" action="user_data.php" method="post">
          <label for="password" class="sr-only">password</label>
          <input id="password" type="password" name="password"
            placeholder="password" />

          <label for="Confpassword" class="sr-only">Confirm Password</label>
          <input id="password" name="password" type="password"
            placeholder="Confirm Password" />

          <input id="login_button" type="submit" value="register" disabled>
        </form>
    </ul>
  </footer>
   <?php
  if(isset($_GET['erreur'])){
    $err = $_GET['erreur'];
  if($err==1 || $err==2)
    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
  }
  ?>
</body>

</html>