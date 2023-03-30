<div class="list">
    <section>
        <div class="message">
            <?php
            if (!empty($params['before'])) {
                switch ($params['before']) {
                    case 'missingUserId':
                        echo 'Wrong user id';
                        break;
                    case 'missingGroupId':
                        echo 'Wrong user id';
                        break;
                    case 'notFound':
                        echo 'Not Found';
                        break;
                }
            }
            ?>
        </div>
        <div class="message">
            <?php
            if (!empty($params['before'])) {
                switch ($params['before']) {
                    case 'created':
                        echo 'User created';
                        break;
                    case 'deleted':
                        echo 'User deleted';
                        break;
                    case 'edited':
                        echo 'User edit';
                        break;
                }
            }
            ?>
        </div>

        <div class="tbl-header">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Birthdate</th>
                    <th>User Group</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table>
                <tbody>
                <?php foreach ($params['users'] ?? [] as $user) : ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $user['id'] ?></td>
                        <td style="text-align:center;"><?php echo $user['username'] ?></td>
                        <td style="text-align:center;"><?php echo $user['first_name'] ?></td>
                        <td style="text-align:center;"><?php echo $user['last_name'] ?></td>
                        <td style="text-align:center;"><?php echo $user['birthdate'] ?></td>
                        <td style="text-align:center;"><?php echo $user['group_name'] ?></td>
                        <td>
                            <a href="/?action=show&id=<?php echo $user['id'] ?>">
                                <button>Details</button>
                            </a>
                            <a href="/?action=delete&id=<?php echo $user['id'] ?>">
                                <button>Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>