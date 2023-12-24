<?php

namespace LaraCore\App\Http\Controllers;

use LaraCore\App\Models\Users;
use LaraCore\Framework\Controller;
use LaraCore\Framework\Request;
use LaraCore\Framework\Session;

class UserController extends Controller
{
  public function login($request, $response)
  {
    if ($request->isPost()) {
      $data = $request->all();
      $studentId = $data['studentId'];

      $user = new Users();
      $user->studentId = $studentId;
      $login = $user->login();

      if ($login) {
        return redirect()->route('quiz.show');
      } else {
        return redirect()->route('login.form');
      }
    }
    return redirect()->route('login.form');
  }

  public function logout()
  {
    Session::remove('user');
    return redirect()->route('login.form');
  }

  public function loginForm()
  {
    return $this->view('login');
  }
  public function index()
  {
    // return view('users');
    return $this->view('users');
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
    dd($request->getParam('id'));
    // return view('user', ['id' => $id]);
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