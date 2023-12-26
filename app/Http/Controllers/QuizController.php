<?php

namespace LaraCore\App\Http\Controllers;

use LaraCore\App\Models\Quize;
use LaraCore\App\Models\Submission;
use LaraCore\Framework\Controller;
use LaraCore\Framework\Request;
use LaraCore\Framework\Session;

class QuizController extends Controller
{
  public function result()
  {
    $alreadySubmitted = $this->isSubmittedGetScore();
    if (!$alreadySubmitted) {
      return redirect()->route('quiz.show');
    }
    return $this->view('result', ['result' => $alreadySubmitted]);
  }

  public function show($request)
  {
    $quiz = new Quize();
    $result = $quiz->getAll();

    $alreadySubmitted = $this->isSubmittedGetScore();
    if ($alreadySubmitted) {
      return redirect()->route('quiz.result');
    }
    return $this->view('quiz', ['result' => $result]);
  }

  public function store($request, $response)
  {
    if ($request->isPost()) {
      $user = Session::get('user');
      $req = $_POST;
      $submissionInfo = $req['submissionInfo'];
      $answers = (array) json_decode($req['answers']);

      // get id key from answers
      $ids = array_keys($answers);

      $quiz = new Quize();
      $result = $quiz->whereIn('id', $ids);

      $submission = new Submission();

      foreach ($result as $key => $value) {
        $questions = json_decode($value->questions);
        if (in_array($value->id, $ids)) {
          $submission->user_id = $user['id'];
          $submission->quiz_id = $value->id;
          $submission->submission_info = $submissionInfo;
          $submission->submission_ans = $answers[$value->id];
          $submission->right_ans = $questions->answer;
          $submission->save();
        }
      }

      // send json response
      $data = [
        'success' => true,
        'message' => 'Data saved successfully',
        'code' => 200,
      ];

      return $response->json($data);
    }
  }

  private function isSubmittedGetScore()
  {
    $userId = Session::get('user')['id'];
    $submissionResult = (new Submission())->where('user_id', $userId);
    if ($submissionResult) {
      $score = 0;
      foreach ($submissionResult as $value) {
        $submissionAns = $value->submission_ans;
        $rightAns = $value->right_ans;
        if ($submissionAns == $rightAns) {
          $score++;
        }
      }
      return [
        'score' => $score,
        'total' => count($submissionResult),
      ];
    }
    return false;
  }
}