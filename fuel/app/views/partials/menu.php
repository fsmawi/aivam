<?php if ($current_user_group == 'Administrators') : ?>
<li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
    <?php echo Html::anchor('admin', 'Dashboard') ?>
</li>

<li class="<?php echo Uri::segment(2) == 'items' ? 'active' : '' ?>">
    <?php echo Html::anchor('admin/items', 'Items') ?>
</li>
<?php endif;?>
<?php if ($current_user_group == 'Administrators') : ?>
<li class="<?php echo (Uri::segment(2) == 'logs' && (Uri::segment(3) == 'create'))? 'active' : '' ?>">
    <?php echo Html::anchor('admin/logs/create', 'Traitement') ?>
</li>
<?php endif;?>
<li class="<?php echo Uri::segment(2) == 'export' ? 'active' : '' ?>">
    <?php echo Html::anchor('admin/export', 'Export') ?>
</li>
<?php if ($current_user_group == 'Administrators') : ?>
<li class="dropdown <?php echo in_array(Uri::segment(2), array('marque', 'model', 'caracteristique', 'motorisation', 'carburation')) ? 'active' : '' ?>">
    <?php echo Html::anchor('#', "Paramètres", array('class' => 'dropdown-toggle', 'data-toggle'=> 'dropdown')) ?>
    <ul class="dropdown-menu">
        <li class="<?php echo Uri::segment(2) == 'caracteristiques' ? 'active' : '' ?>">
            <?php echo Html::anchor('admin/caracteristiques', "Caracteristiques") ?>
        </li>
        <li class="<?php echo Uri::segment(2) == 'carburations' ? 'active' : '' ?>">
            <?php echo Html::anchor('admin/carburations', "Carburations") ?>
        </li>
        <li class="<?php echo Uri::segment(2) == 'cities' ? 'active' : '' ?>">
            <?php echo Html::anchor('admin/cities', "Cities") ?>
        </li>
        <li class="<?php echo Uri::segment(2) == 'marques' ? 'active' : '' ?>">
            <?php echo Html::anchor('admin/marques', "Marques") ?>
        </li>
        <li class="<?php echo Uri::segment(2) == 'models' ? 'active' : '' ?>">
            <?php echo Html::anchor('admin/models', "Models") ?>
        </li>
        <li class="<?php echo Uri::segment(2) == 'segments' ? 'active' : '' ?>">
            <?php echo Html::anchor('admin/segments', "Segments") ?>
        </li>
    </ul>
</li>
<?php endif;?>
<?php if ($current_user_group == 'Administrators') : ?>
<li class="<?php echo Uri::segment(2) == 'users' ? 'active' : '' ?>">
    <?php echo Html::anchor('admin/users', 'Users') ?>
</li>
<li class="<?php echo Uri::segment(2) == 'updates' ? 'active' : '' ?>">
    <?php echo Html::anchor('admin/updates', "Updates") ?>
</li>
<?php endif;?>
