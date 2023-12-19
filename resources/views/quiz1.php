<head>
  <title>Simple EDU Quiz</title>
  <link rel="stylesheet" href="<?= css('quiz1.css') ?>">
</head>

<body>
  <div id="container">
    <header>
      <h1>Simple Javascript Quiz</h1>
      <p>Test your knowledge in <strong>Javascript fundamentals</strong></p>
    </header>
    <section>
      <div id="results"></div>
      <form name="quizForm" onsubmit="return submitAnswers()">
        <h3>1. In which HTML element do we put Javascript code?</h3>
        <input type="radio" name="q1" value="a" id="q1a">a. &lt;js&gt;<br>
        <input type="radio" name="q1" value="b" id="q1b">b. &lt;script&gt;<br>
        <input type="radio" name="q1" value="c" id="q1c">c. &lt;body&gt;<br>
        <input type="radio" name="q1" value="d" id="q1d">d. &lt;link&gt;<br>

        <h3 style="margin-top: 40px;">2. Which HTML attribute is used to reference an external JavaScript file?</h3>
        <input type="radio" name="q2" value="a" id="q2a">a. src<br>
        <input type="radio" name="q2" value="b" id="q2b">b. rel<br>
        <input type="radio" name="q2" value="c" id="q2c">c. type<br>
        <input type="radio" name="q2" value="d" id="q2d">d. href<br>

        <h3 style="margin-top: 40px;">3. How would you write "Hello" in an alert box?</h3>
        <input type="radio" name="q3" value="a" id="q3a">a. msg("Hello");<br>
        <input type="radio" name="q3" value="b" id="q3b">b. alertBox("Hello");<br>
        <input type="radio" name="q3" value="c" id="q3c">c. document.write("Hello");<br>
        <input type="radio" name="q3" value="d" id="q3d">d. alert("Hello");<br>

        <h3 style="margin-top: 40px;">4. JavaScript is directly related to the "Java" programming language</h3>
        <input type="radio" name="q4" value="a" id="q4a">a. True<br>
        <input type="radio" name="q4" value="b" id="q4b">b. False<br>

        <h3 style="margin-top: 40px;">5. A variable in JavaScript must start with which special character</h3>
        <input type="radio" name="q5" value="a" id="q5a">a. @<br>
        <input type="radio" name="q5" value="b" id="q5b">b. $<br>
        <input type="radio" name="q5" value="c" id="q5c">c. #<br>
        <input type="radio" name="q5" value="d" id="q5d">d. No Special Character<br>
        <br><br>
        <input type="submit" value="Submit Answers">
      </form>
    </section>
    <footer>

    </footer>
  </div>

</body>