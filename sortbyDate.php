<?php
    require_once("./config.php");
    
    $query = "SELECT * FROM diary ORDER BY tanggal ASC";    
    $sql = $db->query($query);

    while ($row = $sql->fetch_assoc()) :
    ?>
    <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>            
        <p class="pb-3 text-dark small lh-sm border-bottom">                        
            <strong class="d-block text-gray-dark"><?= $row['tanggal']?></strong>                        
            <a href="diaryEdit.php?id=<?= $row['id_judul']?>" style="text-decoration:none; color:black;"><?= $row['judul']?></a>                                                         
        </p>                                                
    </div>
    <?php endwhile ; ?>