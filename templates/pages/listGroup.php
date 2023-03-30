<div class="list">
    <section>
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
                            <a href="/?action=editGroup&id=<?php echo $group['id'] ?>">
                                <button>Edit</button>
                            </a>
                            <a href="/?action=deleteGroup&id=<?php echo $group['id'] ?>">
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