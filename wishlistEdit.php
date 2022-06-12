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
                <input class="form-control me-2" type="search" placeholder="Cari...">
              </form>
            </div>
          </div>
        </nav>
    </header>

    <main class="px-3 py-5">
        <div class="container mt-5 mb-4 shadow-lg rounded" style="background-color: #598392;">
            <div class="col-3">
                <a class="blog-header-logo text-white fs-3" style="text-decoration: none;">My Wish List</a>
            </div>
            <div class="mb-5">
            <?php  
                include "config.php";
                $id = $_GET['id'];
                $query = "SELECT * FROM wish_list where id = $id;";
                $sql = $db->query($query);
                $data = [];

                while ($row = $sql->fetch_assoc()):
                ?>
                <form id="form" name="form" method="POST">                    
                    <div class="form-group row g-3 mt-2">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama_item" name="nama_item" value="<?= $row['nama_item']?>" placeholder="Apa yang kamu inginkan ?" required="required">
                            <input type="hidden" id="id_update" name="id_update" value="<?= $row['id']?>">   
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="kategori" name="kategori" for="kategori">
                                <option selected><?= $row['status']?></option>
                                <option>Belum</option>
                                <option>Terpenuhi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-sm-12">
                            <input type="file" accept="image/*" class="form-control" id="img" name="img" for="img">
                        </div>
                    </div>                    
                    <div class="form-group row mt-3">
                        <div class="col-sm-12">
                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan" rows="3"><?= $row['catatan']?></textarea>
                        </div>
                    </div>
                    <div class="form-group row g-3 mt-3">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text">Harga</span>
                                <input type="number" step="500" name="harga" class="form-control" id="harga" value="<?= $row['harga']?>" placeholder="Berapa Sih ?">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text">Jumlah</span>
                                <input type="number" step="1" name="jumlah" class="form-control" id="jumlah" value="<?= $row['jumlah']?>" placeholder="Mau Berapa ?">
                            </div>
                        </div>
                        <div class="text-end mb-5">
                            <a class="btn btn-danger bi bi-x-square-fill mt-4" href="./wishlist.php"> Batal</a>
                            <button class="btn btn-create bi bi-send-plus-fill text-dark mt-4" style="background-color:white; margin-right: 11%;" type="submit" id="submit"> Simpan</button>
                        </div>
                    </div>
                </form>
                <?php endwhile ; ?>                
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
        $('#submit').on('click', function() {
        $("#butsave").attr("disabled", "disabled");
        var id_update = $('#id_update').val();
        var nama_item = $('#nama_item').val();
        var kategori = $('#kategori').val();
        var img = $('#img').val();
        var harga = $('#harga').val();
        var jumlah = $('#jumlah').val();
        var catatan = $('#catatan').val();
        if(nama_item!="" && kategori!="" && catatan!=""){
            $.ajax({
                url: "wishlistEdit.php?action=updateWishlist",
                type: "POST",
                data: {
                    id_update : id_update,
                    harga: harga,
                    nama_item: nama_item,
                    catatan: catatan,
                    kategori: kategori,
                    img: img,
                    jumlah: jumlah				
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $("#submit").removeAttr("disabled");
                        $('#fupForm').find('input:text').val('');
                        $("#success").show();
                        $("#success").html('TODO Kamu Berhasil Ditambahkan! >.<'); 						
                    }
                    else if(dataResult.statusCode==201){
                        alert("Terjadi Kesalahan!");
                    }
                    
                }
            });
            }
            else{
                alert('Ups! Ada Kolom yang Masih Kosong');
            }
        });
        });
    </script>
  </body>
</html>