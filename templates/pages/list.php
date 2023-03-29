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
                        echo 'Notatka zostało utworzona';
                        break;
                    case 'deleted':
                        echo 'Notatka została usunięta';
                        break;
                    case 'edited':
                        echo 'Notatka została zaktualizowana';
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
                    <th>Nazwa</th>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                    <th>Data urodzenia</th>
                    <th>Akcje</th>
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
                        <td>
                            <a href="/?action=show&id=<?php echo $user['id'] ?>">
                                <button>Szczegóły</button>
                            </a>
                            <a href="/?action=delete&id=<?php echo $user['id'] ?>">
                                <button>Usuń</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>