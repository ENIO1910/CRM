<div>
    <h3>Add user</h3>
    <div>
        <form class="note-form" action="/?action=create" method="post">
            <ul>
                <li>
                    <label>Username <span class="required">*</span></label>
                    <input type="text" name="username" class="field-long"/>
                </li>
                <li>
                    <label>Hasło<span class="required">*</span></label>
                    <input type="password" name="password" class="field-long"/>
                </li>
                <li>
                    <label>First name<span class="required">*</span></label>
                    <input type="text" name="first_name" class="field-long"/>
                </li>
                <li>
                    <label>Last name<span class="required">*</span></label>
                    <input type="text" name="last_name" class="field-long"/>
                </li>
                <li>
                    <label>Birthdate<span class="required">*</span></label>
                    <input type="date" name="birthdate" class="field-long"/>
                </li>
                <?php if (!empty($params)) : ?>
                <?php $groups = $params; ?>
                <li>
                    <label for="group">Choose a group:</label>

                    <select name="group_id">
                        <?php foreach($groups as $group) : ?>

                            <option value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <?php endif; ?>
                <li>
                    <input type="submit" value="Submit"/>
                </li>

            </ul>
        </form>
    </div>
</div>