<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\NotFoundException;

class UserController extends AbstractController
{

    private function getUser(): array
    {
        $userId = (int) $this->request->getParam('id');
        if(!$userId) {
            $this->redirect('/', ['before' => 'missingUserId']);
        }

        return $this->userModel->get($userId);

    }
    public function listAction(): void
    {

        $users = $this->userModel->list();

        $viewParams = [
            'users' => $users,
            'before' => $this->request->getParam('before')
        ];

        $this->view->render('list', $viewParams);
    }

    public function showAction(): void
    {


        $user = $this->getUser();

        $this->view->render(
            'show',
            ['user' => $user]
        );
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


    public function editAction()
    {
        if($this->request->isPost()) {
            $userId = (int) $this->request->postParam('id');
            $userData = [
                'nazwa' => $this->request->postParam('nazwa'),
                'password' => $this->request->postParam('password'),
                'imie' => $this->request->postParam('imie'),
                'nazwisko' => $this->request->postParam('nazwisko'),
                'data_urodzenia' => $this->request->postParam('date')
            ];

            $this->userModel->update($userId, $userData);
            $this->redirect('/', ['before' => 'edited']);

        }

        $user = $this->getUser();

        $this->view->render(
            'edit',
            ['note' => $user]
        );
    }


//    /**
//     * @return void
//     * @throws \App\Exception\StorageException
//     */
//    public function deleteAction(): void
//    {
//
//        if($this->request->isPost())
//        {
//
//            $id = (int) $this->request->postParam('id');
//            $this->userModel->delete($id);
//            $this->redirect('/Notatki/', ['before' => 'deleted']);
//        }
//
//
//        $this->view->render('delete', ['note' => $this->getUser()]);
//    }
}
