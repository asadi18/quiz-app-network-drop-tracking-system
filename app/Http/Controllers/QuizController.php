<?php

namespace LaraCore\App\Http\Controllers;

use LaraCore\App\Models\Quize;
use LaraCore\Framework\Controller;
use LaraCore\Framework\Request;

class QuizController extends Controller
{
  public function index()
  {
    return $this->view('quiz1');
  }
  public function store(Request $request)
  {
    if ($request->isPost()) {
      $data = $request->all();
      dd($data);
    }
  }


  public function show(Request $request)
  {
    $quiz = new Quize();
    $result = $quiz->getAll();
    return $this->view('quiz', ['result' => $result]);
  }

  public function edit($id)
  {
    return view('edit-user', ['id' => $id]);
  }

  public function delete($id)
  {
    return view('delete-user', ['id' => $id]);
  }

  public function posts($id)
  {
    return view('user-posts', ['id' => $id]);
  }

  public function contact(Request $request)
  {
    dd($request->all());
  }
}