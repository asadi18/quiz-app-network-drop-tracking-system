<head>
  <title>Simple EDU Quiz</title>
  <link rel="stylesheet" href="<?= css('quiz1.css') ?>">
</head>

<body>
  <div class="popup">
    <div class="icon"><i class="uil uil-wifi-slash"></i></div>

    <div class="details">
      <h2 class="title">Lost Connection</h2>
      <p class="desc"> Your Network is unavailabel. we will attepmt to recconet it.</p>
      <button class="reconnect">Reconnect Now</button>

    </div>
  </div>

  <div id="container">
    <a href="<?= app_url('logout') ?>" class="logout">Logout</a>
    <header>
      <h1>General knowledge Quiz</h1>
      <p>Test your knowledge in <strong>Global Information</strong></p>
    </header>
    <section>
      <div id="results"></div>
      <form name="quizForm" id="submitForm">
        <?php
        $sl = 0;
        ?>
        <?php foreach ($result as $quiz): ?>
          <?php

          $q = json_decode($quiz->questions);
          $sl++;
          ?>
          <h3><?= $sl ?>. <?= $q->question; ?></h3>

          <label for="<?= $quiz->id ?>-a">
            <input type="radio" name="<?= $quiz->id ?>" value="a" id="<?= $quiz->id ?>-a">
            a. <?= $q->choices->a ?>
          </label>
          <br>
          <label for="<?= $quiz->id ?>-b">
            <input type="radio" name="<?= $quiz->id ?>" value="b" id="<?= $quiz->id ?>-b">
            b. <?= $q->choices->b ?>
          </label>
          <br>
          <label for="<?= $quiz->id ?>-c">
            <input type="radio" name="<?= $quiz->id ?>" value="c" id="<?= $quiz->id ?>-c">
            c. <?= $q->choices->c ?>
          </label>
          <br>
          <label for="<?= $quiz->id ?>-d">
            <input type="radio" name="<?= $quiz->id ?>" value="d" id="<?= $quiz->id ?>-d">
            d. <?= $q->choices->d ?>
          </label>
          <br>
          <!-- <input type="radio" name="<?= $quiz->id ?>[]" value="b" id="q1b">b. <?= $q->choices->b ?><br>
          <input type="radio" name="<?= $quiz->id ?>[]" value="c" id="q1c">c. <?= $q->choices->c ?><br>
          <input type="radio" name="<?= $quiz->id ?>[]" value="d" id="q1d">d. <?= $q->choices->d ?><br> -->

        <?php endforeach; ?>
        <input id="submit-btn" type="submit" value="Submit Answers">
      </form>
    </section>
    <footer>

    </footer>
  </div>
  <script src="<?= js("script.js") ?>"></script>
  <script>
  const setLocalStorage = (key, data) => {
    localStorage.setItem(key, JSON.stringify(data))
  }
  const getLocalStorage = (key) => {
    return JSON.parse(localStorage.getItem(key))
  }
  // select all radio button by name
  const radioBtns = document.querySelectorAll('input[type="radio"]');

  function disableOptions(quizName) {
    // Get all radio buttons for the specified quiz
    var radioButtons = document.querySelectorAll('input[name="' + quizName + '"]');

    // Disable all other options
    radioButtons.forEach(function(radioButton) {
      if (radioButton.value !== document.querySelector('input[name="' + quizName + '"]:checked').value) {
        radioButton.disabled = true;
      }
    });
  }
  radioBtns.forEach((item) => {
    item.addEventListener('click', (e) => disableOptions(item.name))
  })

  const submitForm = document.getElementById('submitForm');
  const submissionInfo = {
    startTime: new Date(),
  }
  const submitBtn = document.getElementById('submit-btn');

  const saveData = (formData) => {
    fetch('<?= app_url('result-store') ?>', {
        method: 'POST',
        body: formData,
      }).then(res => res.json())
      .then(data => {
        submitForm.reset();
        if (data.success) {
          // clear local storage after send data in server
          localStorage.clear();
          window.location.href = '<?= app_url('result') ?>'
        }
      })
  }

  // check local storage are available or not
  const checkedStorage = () => {
    const submissionInfo = getLocalStorage('submissionInfo')
    const answers = getLocalStorage('answers')
    if (!submissionInfo && !answers) {
      console.log('%cSorry!, local storage are empty',
        'color:#fff; background: #0724ff; padding:5px; border-radius: 5px')
      return
    }
    if (!navigator.onLine) return
    submissionInfo.sendDataIntoServerTime = new Date()
    if (submissionInfo && answers) {
      const formData = new FormData();
      formData.append('submissionInfo', JSON.stringify(submissionInfo))
      formData.append('answers', JSON.stringify(answers))
      saveData(formData)
    }
  }
  checkedStorage()

  submitForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData();
    submitBtn.disabled = true;
    // add submission time  
    submissionInfo.submissionTime = new Date()

    // select all radio button which is checked 
    const radioBtns = document.querySelectorAll('input[type="radio"]:checked');

    const data = {}
    radioBtns.forEach((item) => {
      data[item.name] = item.value
    })

    formData.append('submissionInfo', JSON.stringify(submissionInfo))
    formData.append('answers', JSON.stringify(data))

    // checked network 
    if (!navigator.onLine) {
      submissionInfo.networkFailureTime = new Date()
      alert('You are offline')
    } else {
      submissionInfo.sendDataIntoServerTime = new Date()
      saveData(formData)
    }
    setLocalStorage('submissionInfo', submissionInfo)
    setLocalStorage('answers', data)
  })
  </script>

</body>