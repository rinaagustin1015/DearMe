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
        <div class="container mt-5 mb-4 shadow shadow-lg rounded" style="background-color: #598392;">
            <div class="col-3">
                <a class="blog-header-logo text-white fs-3" style="text-decoration: none;">My Wish List</a>
            </div>
            <div class="mb-5">
                <form id="form" name="form" method="POST">                    
                    <div class="form-group row g-3 mt-2">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama_item" name="nama_item" placeholder="Apa yang kamu inginkan ?" required="required">   
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="kategori" name="kategori" for="kategori">
                                <option selected>Belum</option>
                                <option>Terpenuhi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                                <input type="text" class="form-control" id="link_item" name="link_item" for="link_item" placeholder="Link barang yang kamu inginkan" required="required">
                            </div>                        
                        </div>
                    </div>                    
                    <div class="form-group row mt-3">
                        <div class="col-sm-12">
                            <textarea class="form-control" id="catatan" name="catatan" for="catatan" rows="3" placeholder="Catatan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row g-3 mt-3">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text">Harga</span>
                                <input class="form-control" type="number" step="500" name="harga"  id="harga" for="harga" value="" placeholder="Berapa Sih ?">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text">Jumlah</span>
                                <input class="form-control" type="number" step="1" name="jumlah" id="jumlah" for="jumlah" value="" placeholder="Mau Berapa ?">
                            </div>
                        </div>
                        <div class="text-end mb-5">
                            <a class="btn btn-danger bi bi-x-square-fill mt-4" href="./wishlist.php"> Batal</a>
                            <button class="btn btn-create bi bi-send-plus-fill text-dark mt-4" style="background-color:white; margin-right: 11%;" type="submit" id="submit" for="submit"> Simpan</button>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        // ADD WISHLIST
        $(document).ready(function() {
        $("#submit").on('click', function() {
        $("#butsave").attr("disabled", "disabled");
        var nama_item = $('#nama_item').val();
        var status = $('#kategori').val();
        var link_item = $('#link_item').val();
        var catatan = $('#catatan').val();
        var harga = $('#harga').val();
        var jumlah = $('#jumlah').val();
        if(nama_item!="" && link_item!="" && status!="" && harga!=""){
            $.ajax({
                url: "simpanDiary.php?action=simpanWishlist",
                type: "POST",
                data: {
                    nama_item: nama_item,
                    status: status,
                    link_item: link_item,
                    catatan: catatan,
                    harga: harga,
                    jumlah: jumlah				
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        alert("WISHLIST Kamu Berhasil Ditambahkan! >.<")	
                        window.location = "wishlist.php"
                                
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