<html>

<head>
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
  body {
    text-align: center;
    padding: 40px 60px;
    background: #EBF0F5;
    border-radius: 2.25rem;

  }

  h1 {
    color: #88B04B;
    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    font-weight: 900;
    font-size: 40px;
    margin-bottom: 10px;
  }

  p {
    color: #404F5E;
    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    font-size: 20px;
    margin: 0;
  }

  i {
    color: #9ABC66;
    font-size: 100px;
    line-height: 200px;
    margin-left: -15px;
  }

  .card {
    background: white;
    padding: 50px;
    border-radius: 2.25rem;
    box-shadow: 0 2px 3px #C8D0D8;
    display: inline-block;
    margin: 0 auto;
  }

  .logout {
    margin-top: 50px;
    width: 100%;
  }

  .logout a {
    padding: 20px;

    font-size: 20px;

    height: 45px;
    background-color: #002456;
    border: none;
    text-decoration: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1em;
    color: #ffffff;
    font-weight: 500;
  }

  .logout a:hover {
    border: 2px solid #121571;
    border-radius: 5px;
    background-color: #012255;
    color: #ffffff;
  }
</style>

<body>

  <div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
      <i class="checkmark">✓</i>
    </div>
    <h1>Successfully Submitted </h1>
    <h3>You Submitted <?= $result['total'] ?></h3>
    <p>You Have scored <span> <?= $result['score'] ?> </span> <br /> Thanks for your Participation</p>


  </div>
  <div class="logout">
    <a href="<?= app_url('logout') ?>" class="logout">Logout</a>
  </div>

</body>

</html>