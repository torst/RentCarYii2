<option
        value="<?= $type['id']?>"
        <?php if ($type['id'] == $this->model->parent_id) echo ' selected'?>
        <?php if ($type['id'] == $this->model->id) echo ' disabled'?>
        ><?=$tab . $type['name']?>
</option>
<?php if (isset($type['childs']) ) :?>
    <ul>
        <?= $this->getMenuHtml($type['childs'], $tab . '--') ?>
    </ul>
<?php endif; ?>