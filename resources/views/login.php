<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <title>Quiz App Network Fall Solution</title>
  <link rel="stylesheet" href="<?= css('login.css') ?>">

</head>

<body>
  <!-- <header>
    <h2 class="logo">Qanfs</h2>
    <nav class="navigation">
      <button class="btnLogin-popup">Login</button>
    </nav>
  </header> -->

  <div class="wrapper">
    <div class="form-box login">
      <h2>Login</h2>
      <form action="<?= app_url('login') ?>" method="POST">
        <div class="input-box">
          <!-- <span class="icon">
            <ion-icon name="user"></ion-icon>
          </span> -->

          <input type="text" required name="studentId" />
          <label>Student ID</label>
        </div>
        <!-- <div class="input-box">
          <span class="icon">
            <ion-icon name="lock-closed"></ion-icon>
          </span>

          <input type="password" required />
          <label>Password</label>
        </div> -->

        <button type="submit" class="login-btn">GO</button>
        <!-- <div class="login-register">
          <p>Don't Have account ?</p>
          <a href="">Register Now!</a>
        </div> -->
      </form>
    </div>
  </div>

  <script src="srcipt.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="<?= js('login.js') ?>"></script>
</body>

</html>