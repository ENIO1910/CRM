<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\NotFoundException;

class UserController extends AbstractController
{

    public function listAction(): void
    {

        $users = $this->userModel->list();

        $viewParams = [
            'users' => $users,
            'before' => $this->request->getParam('before')
        ];

        $this->view->render('list', $viewParams);
    }

  public function createAction()
  {
      if ($this->request->hasPost()) {
          $userData = [
              'nazwa' => $this->request->postParam('nazwa'),
              'password' => $this->request->postParam('password'),
              'imie' => $this->request->postParam('imie'),
              'nazwisko' => $this->request->postParam('nazwisko'),
              'data_urodzenia' => $this->request->postParam('date')
          ];
          $this->userModel->create($userData);
          $this->redirect('/', ['before' => 'created']);
      }
        $this->view->render('create');
  }
}
