<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
<br/>
<a href="/auth/register">Dodaj użytkownika</a>
<table border="1">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Rola</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user){?>
        <tr>
            <td><?php echo $user->username;?></td>
            <td><?php echo $user->email;?></td>
            <td><?php foreach($user->roles->find_all() as $role){ echo $role->name.' '; } ?></td>
            <td><a href="/administration/users/edit/<?php echo $user->id;?>">EDYTUJ</a> | <a href="/administration/users/delete/<?php echo $user->id;?>" onclick="return confirm('Na pewno usunąć tego użytkownika?');">USUŃ</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
