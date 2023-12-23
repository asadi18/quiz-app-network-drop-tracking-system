<head>
  <title>Simple EDU Quiz</title>
  <link rel="stylesheet" href="<?= css('quiz1.css') ?>">
</head>



<body>
  <div id="container">
    <a href="<?= app_url('logout') ?>" class="logout">Logout</a>
    <header>
      <h1>Simple Javascript Quiz</h1>
      <p>Test your knowledge in <strong>Javascript fundamentals</strong></p>
    </header>
    <section>
      <div id="results"></div>
      <form name="quizForm" onsubmit="return submitAnswers()">
        <?php
        $sl = 0;
        ?>
        <?php foreach ($result as $quiz): ?>
          <?php

          $q = json_decode($quiz->questions);
          $sl++;
          ?>
          <h3><?= $sl ?>. <?= $q->question; ?></h3>

          <label for="<?= $quiz->id ?>[a]">
            <input type="radio" name="<?= $quiz->id ?>[]" value="a" id="<?= $quiz->id ?>[a]">
            a. <?= $q->choices->a ?>
          </label>
          <br>
          <label for="<?= $quiz->id ?>[b]">
            <input type="radio" name="<?= $quiz->id ?>[]" value="b" id="<?= $quiz->id ?>[b]">
            b. <?= $q->choices->b ?>
          </label>
          <br>
          <label for="<?= $quiz->id ?>[c]">
            <input type="radio" name="<?= $quiz->id ?>[]" value="c" id="<?= $quiz->id ?>[c]">
            c. <?= $q->choices->c ?>
          </label>
          <br>
          <label for="<?= $quiz->id ?>[d]">
            <input type="radio" name="<?= $quiz->id ?>[]" value="d" id="<?= $quiz->id ?>[d]">
            d. <?= $q->choices->d ?>
          </label>
          <br>
          <!-- <input type="radio" name="<?= $quiz->id ?>[]" value="b" id="q1b">b. <?= $q->choices->b ?><br>
          <input type="radio" name="<?= $quiz->id ?>[]" value="c" id="q1c">c. <?= $q->choices->c ?><br>
          <input type="radio" name="<?= $quiz->id ?>[]" value="d" id="q1d">d. <?= $q->choices->d ?><br> -->

        <?php endforeach; ?>
        <input type="submit" value="Submit Answers">
      </form>
    </section>
    <footer>

    </footer>
  </div>

</body>