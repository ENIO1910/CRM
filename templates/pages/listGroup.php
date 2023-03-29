<div class="list">
    <section>
        <div class="message">
            <?php
            if (!empty($params['before'])) {
                switch ($params['before']) {
                    case 'created':
                        echo 'Grupa została utworzona';
                        break;
                    case 'deleted':
                        echo 'Grupa została usunięta';
                        break;
                    case 'edited':
                        echo 'Grupa została zaktualizowana';
                        break;
                    case 'missingUserId':
                        echo 'Wrong user id';
                        break;
                    case 'notFound':
                        echo 'Not Found';
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
                    <th>Akcja</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table>
                <tbody>
                <?php foreach ($params['groups'] ?? [] as $group) : ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $group['id'] ?></td>
                        <td style="text-align:center;"><?php echo $group['name'] ?></td>
                        <td>
                            <a href="/?action=show&id=<?php echo $group['id'] ?>">
                                <button>Szczegóły</button>
                            </a>
                            <a href="/?action=delete&id=<?php echo $group['id'] ?>">
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