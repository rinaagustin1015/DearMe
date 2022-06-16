<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>DearMe</title>
  </head>
<body>
  <header class="py-2">
      <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#598392;">
        <div class="container-fluid px-4">
          <a class="navbar-brand blog-header-logo text-white fs-3 fw-bolder" href="index.html">DearMe?</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item"><a class="nav-link" href="diary.php" style="font-size: medium; color: white;">Diary</a></li>
              <li class="nav-item"><a class="nav-link fw-bolder active" href="wishlist.php" style="font-size: medium; color: #598392;">Wish List</a></li>
              <li class="nav-item"><a class="nav-link" href="todolist.php" style="font-size: medium; color: white;">To Do List</a></li>
              <li class="nav-item"><a class="nav-link" href="index.html" style="font-size: medium; color: white;">Keluar</a></li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" id="ngetik" name="ngetik" placeholder="Cari...">
            </form>
          </div>
        </div>
      </nav>
  </header>

  <main class="px-3 py-5">
      <div class="p-3 my-3 text-dark rounded shadow-sm py-2">
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-auto">
                <h1 class="h6 mb-0 text-dark">Apa keinginanmu hari ini?</h1>
            </div>
            <div class="col-auto">
                <a class="btn btn-secondary me-md-3" href="formWishlist.php" style="background-color: #598392;"><span><i class="bi bi-bookmark-plus-fill text-light"></i></span> Tambahkan</a>
            </div>
      </div>      
    </div>
    <div class="d-flex align-items-center p-3 my-3 text-dark rounded shadow-sm">
        <div class="d-flex align-items-center">                
          <select class="form-select" id="kategori" name="kategori" for="kategori">
            <option value="0" selected>Status</option>
            <option value="1">Belum</option>
            <option value="2">Terpenuhi</option>
          </select>
        </div>
    </div>   

    <div>        
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-5" id="data" name="data">
          <?php
              include "config.php";
              $query = "SELECT * FROM wish_list";
              $sql = $db->query($query);
              $data = [];
      
              while ($row = $sql->fetch_assoc()):
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
        <?php endwhile ; ?>
      </div>          
    </div>      
  </main>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script>
    var ngetik = document.getElementById("ngetik");
    var data = document.getElementById("data");

    ngetik.addEventListener("keyup", function () {
    var ObjAjax = new XMLHttpRequest();

    ObjAjax.onreadystatechange = function () {
        if (ObjAjax.readyState == 4 && ObjAjax.status == 200) {
        data.innerHTML = ObjAjax.responseText;
        }
    };

    ObjAjax.open("get", "./searchWishlist.php?ngetik=" + ngetik.value, true);
    ObjAjax.send();
    });

    var kategori = document.getElementById("kategori");
    var data = document.getElementById("data");

    kategori.addEventListener("click", function () {
    var ObjAjax = new XMLHttpRequest();

    ObjAjax.onreadystatechange = function () {
        if (ObjAjax.readyState == 4 && ObjAjax.status == 200) {
        data.innerHTML = ObjAjax.responseText;
        }
    };

    ObjAjax.open("get", "./sortWishlist.php?kategori=" + kategori.value, true);
    ObjAjax.send();
    });
  </script>
</body>
</html>