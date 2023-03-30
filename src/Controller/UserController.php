<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\NotFoundException;

class UserController extends AbstractController
{

    private function getGroup(): array
    {
        $groupId = (int)$this->request->getParam('id');
        if (!$groupId) {
            $this->redirect('/');
        }
        return $this->groupModel->get($groupId);
    }
    private function getUser(): array
    {
        $userId = (int)$this->request->getParam('id');
        if (!$userId) {
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
                'username' => $this->request->postParam('username'),
                'password' => $this->request->postParam('password'),
                'first_name' => $this->request->postParam('first_name'),
                'last_name' => $this->request->postParam('last_name'),
                'birthdate' => $this->request->postParam('birthdate'),
                'group_id' => $this->request->postParam('group_id')
            ];
            $this->userModel->create($userData);
            $this->redirect('/', ['before' => 'created']);
        }
        $groups = $this->groupModel->list();
        $this->view->render('create', $groups);
    }


    public function editAction()
    {
        if ($this->request->isPost()) {
            $userId = (int)$this->request->postParam('id');
            $userData = [
                'username' => $this->request->postParam('username'),
                'password' => $this->request->postParam('password'),
                'first_name' => $this->request->postParam('first_name'),
                'last_name' => $this->request->postParam('last_name'),
                'birthdate' => $this->request->postParam('birthdate'),
                'group_id' => $this->request->postParam('group_id')
            ];

            $this->userModel->update($userId, $userData);
            $this->redirect('/', ['before' => 'edited']);

        }

        $user = $this->getUser();
        $groups = $this->groupModel->list();
        $this->view->render(
            'edit',
            ['user' => $user, 'groups' => $groups]
        );
    }


    /**
     * @return void
     * @throws \App\Exception\StorageException
     */
    public function deleteAction(): void
    {

        if ($this->request->isPost()) {
            $id = (int)$this->request->postParam('id');
            $this->userModel->delete($id);
            $this->redirect('/', ['before' => 'deleted']);
        }

        $this->view->render('delete', ['user' => $this->getUser()]);
    }


    public function createGroupAction(): void
    {
        if ($this->request->hasPost()) {
            $groupData = [
                'name' => $this->request->postParam('name')
            ];
            $this->groupModel->create($groupData);
            $this->redirect('/');
        }
        $this->view->render('createGroup');
    }

    public function listGroupAction(): void
    {
        $groups = $this->groupModel->list();

        $viewParams = [
            'groups' => $groups,
            'before' => $this->request->getParam('before')
        ];

        $this->view->render('listGroup', $viewParams);
    }

    public function editGroupAction()
    {
        if ($this->request->isPost()) {
            $groupId = (int)$this->request->postParam('id');
            $groupData = [
                'name' => $this->request->postParam('name'),
            ];

            $this->groupModel->update($groupId, $groupData);
            $this->redirect('/');

        }
        $this->view->render(
            'editGroup',
            ['group' => $this->getGroup()]
        );
    }

    public function deleteGroupAction(): void
    {

        if ($this->request->isPost()) {
            $id = (int)$this->request->postParam('id');
            $this->groupModel->delete($id);
            $this->redirect('/');
        }

        $this->view->render('deleteGroup', ['group' => $this->getGroup()]);
    }

}
