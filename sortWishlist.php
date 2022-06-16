<?php
    require_once("./config.php");
    $kategori = $_GET["kategori"];

    if ($kategori == 0) {
        $query = "SELECT * FROM wish_list";
    } else if ($kategori == 1){
        $query = "SELECT * FROM wish_list WHERE status = 'Belum';";
    } else {
        $query = "SELECT * FROM wish_list WHERE status = 'Terpenuhi';";
    }
    
    $sql = $db->query($query);

    while ($row = $sql->fetch_assoc()) :
    ?>
    <div class="col">
        <div class="card" style="width: 18rem;">
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?= $row['status']?></div>
                <div class="card-body" style="background-color:#598392">
                    <p class="pt-3 card-text fw-bolder"><?= $row['nama_item']?></p>
                    <p class="text-light">Rp. <?= $row['harga']?></p>
                    <a href="wishlistEdit.php?id=<?= $row['id']?>" class="btn btn-light">Kelola</a>                
                    <a href="delete.php?action=deleteWishlist&id=<?= $row['id']?>"><i class="bi bi-trash-fill" style="color: red; float: right;"></i></a>                
                    <a href="<?= $row['link_item']?>" target="_blank"><i class="bi bi-link-45deg px-3" style="color: white; float: right;"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile ; ?>