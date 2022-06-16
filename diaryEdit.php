<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>DearMe</title>
  </head>

  <body>
    <?php  
      include "config.php";
      $id = $_GET['id'];
      $query = "SELECT * FROM diary JOIN kategori ON diary.kategori_id = kategori.id where diary.id_judul = $id;";
      $sql = $db->query($query);
      $data = [];

      while ($row = $sql->fetch_assoc()):
      ?>
    <header class="py-2">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#598392;">
            <div class="container-fluid px-4">
              <a class="navbar-brand blog-header-logo text-white fs-3 fw-bolder" href="index.html">DearMe?</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                  <li class="nav-item"><a class="nav-link fw-bolder active" href="diary.php" style="font-size: medium; color: #598392;">Diary</a></li>
                  <li class="nav-item"><a class="nav-link" href="wishlist.php" style="font-size: medium; color: white;">Wish List</a></li>
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
      <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      </div>
      
      <div class="container mt-5 mb-4 shadow-lg rounded" style="background-image: url('asset/bg-diary.png'); background-size: 100% 100%;">
          <form id="form" name="form" method="POST">
              <div class="form-group row g-3 mt-3">
                  <div style="margin-top: 7%;">
                      <div class="col-3 text-center">
                          <a class="blog-header-logo fs-3" style="color:#598392; text-decoration: none;">My Note</a>
                      </div>
                  </div>
                      <label class="col-sm-1 col-form-label" for="judul"></label>
                      <div class="col-sm-5">
                          <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" value="<?= $row['judul']?>" required>
                          <input type="hidden" id="id_update" name="id_update" value="<?= $row['id_judul']?>">
                        </div>             
                  <div class="col-md-2">
                      <select class="form-select" id="kategori_id" name="kategori_id" for="kategori_id">
                          <option value="<?= $row['kategori_id']?>" selected><?= $row['kategori']?></option>
                      </select>
                  </div>
                  <div class="col-md-2">
                      <input type="date" class="date form-control text-light" name="tanggal" id="tanggal" value="<?= $row['tanggal']?>" style="color: dark;">
                  </div>
                  <div class="form-group row mt-3">
                      <label class="col-sm-1 mt-3 col-form-label" for="isi"></label>
                      <div class="col-sm-10">
                          <textarea class="form-control" id="isi" name="isi" cols="100" rows="20" value="<?= $row['isi']?>" placeholder="Tulis disini..."><?= $row['isi']?></textarea>
                      </div>
                  </div>
                  <div class="text-end my-auto mb-5">                        
                      <a class="btn btn-danger bi bi-x-square-fill px-3 mt-4" href="./diary.php"> Kembali</a>
                      <button class="btn btn-danger bi bi-trash-fill px-3 mt-4" id="delete" name="delete" for=""> Hapus</button>
                      <button class="btn btn-create bi bi-send-plus-fill px-3 mt-4" style="margin-right: 11%;" type="submit" id="submit"> Simpan</button>
                  </div>
              </div>                      
          </form> 
                               
      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function () { 
          $.get("kategori.php?action=kategori", function (respon){
              $.each(respon, function (key, value){
                  $("#kategori_id").append("<option value='" + value.id + "'>" + value.kategori +"</option>")
              });
          });
      });

      $(document).ready(function() {
      $('#submit').on('click', function() {
      $("#butsave").attr("disabled", "disabled");
      var id_update = $('#id_update').val();
      var judul = $('#judul').val();
      var kategori_id = $('#kategori_id').val();
      var tanggal = $('#tanggal').val();
      var isi = $('#isi').val();
      if(tanggal!="" && judul!="" && isi!="" && kategori_id!=""){
        $.ajax({
          url: "updateDiary.php?action=updateDiary",
          type: "POST",
          data: {
                id_update : id_update,
                tanggal: tanggal,
                judul: judul,
                isi: isi,
                kategori_id: kategori_id				
          },
          cache: false,
          success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
              alert("Diary Kamu Berhasil Diedit! >.<") 	
              window.location = "diary.php"						
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

      $(document).ready(function() {
      $('#delete').on('click', function() { 
        var id_update = $('#id_update').val();
        $.ajax({
          url: "delete.php?action=deleteDiary",
          type: "POST",
          cache: false,
          data:{
            id_update : id_update,
          },
          success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
              // $("#submit").removeAttr("disabled");
              // $('#fupForm').find('input:text').val('');
              // $("#success").show('');
              // $("#success").html('Diary Kamu Berhasil Dihapus! >.<');
              alert("Diary Kamu Berhasil Dihapus! >.<")
              window.location = "diary.php"		
              	
            }
            else if(dataResult.statusCode==201){
              alert("Terjadi Kesalahan!");
            }
          } 
          });
        });
      });
    </script>
    <?php endwhile ; ?>
  </body>
</html>