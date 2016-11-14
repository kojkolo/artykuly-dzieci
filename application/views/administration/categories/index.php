<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
<br/>
<a href="/administration/categories/add">Dodaj kategorię</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        function subcates($sc){
            echo '<tr><td colspan="4"><table class="table table-hover">';
                        foreach($sc as $subcategory){?>

                        <tr>
                            <td><?php echo $subcategory->id;?></td>
                            <td><?php echo $subcategory->name;?></td>
                            <td><?php echo $subcategory->description;?></td>
                            <td><a href="/administration/categories/edit/<?php echo $subcategory->id;?>">EDYTUJ</a> | <a href="/administration/categories/delete/<?php echo $subcategory->id;?>" onclick="return confirm('Na pewno usunąć tą kategorię?');">USUŃ</a></td>
                        </tr>
                        <?php if(count($subcategory->childs->find_all()))subcates($subcategory->childs->find_all());
                        }
                        echo '</table></td></tr>';
                    }
        foreach($categories as $category){?>
        <tr>
            <td><?php echo $category->id;?></td>
            <td><?php echo $category->name;?></td>
            <td><?php echo $category->description;?></td>
            <td><a href="/administration/categories/edit/<?php echo $category->id;?>">EDYTUJ</a> | <a href="/administration/categories/delete/<?php echo $category->id;?>" onclick="return confirm('Na pewno usunąć tą kategorię?');">USUŃ</a></td>
        </tr>
                    <?php 
                        if(count($category->childs->find_all())){subcates($category->childs->find_all());}
                    ?>

        <?php } ?>
    </tbody>
</table>
