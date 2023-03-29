<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\NotFoundException;

class GroupController extends UserController
{
    public function listGroupAction(): void
    {

        $groups = $this->groupModel->listGroup();

        $viewParams = [
            'groups' => $groups,
            'before' => $this->request->getParam('before')
        ];

        $this->view->render('listGroup', $viewParams);
    }

}
