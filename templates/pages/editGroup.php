<div>
    <h3>Edit group</h3>
    <?php if (!empty($params['group'])) : ?>
    <?php $group = $params['group']; ?>
    <div>
        <form class="note-form" action="/?action=editGroup" method="post">
            <input name="id" type="hidden" value="<?php echo $group['id'] ?>" />
            <ul>
                <li>
                    <label>Name<span class="required">*</span></label>
                    <input type="text" name="name" value="<?php echo $group['name']; ?>" class="field-long"/>
                </li>
                <li>
                    <input type="submit" value="Submit"/>
                </li>
            </ul>
        </form>
    </div>
    <?php else : ?>
        <div>
            No data to display
            <a href="/"><button>Back to users list</button></a>
        </div>
    <?php endif; ?>
</div>