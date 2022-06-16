<?php
    require_once("./config.php");
    $query = "SELECT * FROM to_do_list ORDER BY tanggal ASC;";
    $sql = $db->query($query);
    $data = [];

    while ($row = $sql->fetch_assoc()):
    ?>
    <tr>
    <th scope="row"><?= $row['tanggal']?></th>
    <td>
        <?= $row['to_do']?>
    </td>
    <td>
        <?= $row['catatan']?>
    </td>
    <td>
        <?= $row['status']?>
    </td>
    <td>
        <a href="todolistEdit.php?id=<?= $row['id']?>"><i class="bi bi-pencil-square" style="color: blue;"></i></a>
        <a href="delete.php?action=deleteTodolist&id=<?= $row['id']?>"><i class="bi bi-trash-fill" style="color: red"></i></a>   
        <input type="hidden" id="id_delete" name="id_delete" for="id_delete" value="<?= $row['id']?>">
    </td>
    </tr>
    <?php endwhile ; ?>