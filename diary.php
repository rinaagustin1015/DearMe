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
                    <li class="nav-item"><a class="nav-link fw-bolder active" href="diary.php" style="font-size: medium; color: #598392;">Diary</a></li>
                    <li class="nav-item"><a class="nav-link" href="wishlist.php" style="font-size: medium; color: white;">Wish List</a></li>
                    <li class="nav-item"><a class="nav-link" href="todolist.php" style="font-size: medium; color: white;">To Do List</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html" style="font-size: medium; color: white;">Keluar</a></li>
                    </ul>
                    <form class="d-flex">
                    <input class="form-control me-2" type="search" id="ngetik" placeholder="Cari...">
                    </form>
                </div>
                </div>
            </nav> 
        </header>

        <main class="px-3 py-5">
            <div class="p-3 my-3 text-dark rounded shadow-sm py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-auto">
                        <h1 class="h6 mb-0 text-dark">Ingin Menambah Cerita Hari ini?</h1>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-secondary me-md-3 shadow" href="formDiary.php" style="background-color: #598392;"><span><i class="bi bi-bookmark-plus-fill text-light"></i></span> Tambahkan</a>
                    </div>         
                </div>
            </div>

            <div class="d-flex align-items-center p-3 my-3 text-dark rounded shadow-sm">
                <div class="d-flex align-items-center">                
                    <select class="form-select" id="kategori_id" name="kategori_id" for="kategori_id">
                          <option value="0" selected>Pilih Mood</option>
                    </select>
                </div>
            </div>            
            <div class="my-3 p-3 bg-body rounded shadow-sm" id="diary">                
                <h6 class="border-bottom pb-2 mb-0"><button class="bi bi-funnel-fill" id="byDate" name="byDate" for="byDate"></button> Catatan Tersimpan</h6>

            <div class="" id = "data" name="data">
            
            </div class="py-5">
            <div class="text-center py-4" style="float: right;">
                <button type="button" class="btn btn-secondary me-md-3 shadow" style="background-color: #598392; text-decoration: none; color:white;" name="page" id="page">Lebih Banyak</button>
            </div>
        </main>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script>
        // GET KATEGORi
        $(document).ready(function () {
            $.get("kategori.php?action=kategori", function (respon) {
                $.each(respon, function (key, value) {
                    $("#kategori_id").append("<option value='" + value.id + "'>" + value.kategori + "</option>")
                });
            });
        });

        // SEARCHING
        var ngetik = document.getElementById("ngetik");
        var data = document.getElementById("data");

        ngetik.addEventListener("keyup", function () {
        var ObjAjax = new XMLHttpRequest();

        ObjAjax.onreadystatechange = function () {
            if (ObjAjax.readyState == 4 && ObjAjax.status == 200) {
            data.innerHTML = ObjAjax.responseText;
            }
        };

        ObjAjax.open("get", "./searchDiary.php?ngetik=" + ngetik.value, true);
        ObjAjax.send();
        });     
        
        // SORTING BY KATEGORY
        var kategori_id = document.getElementById("kategori_id");
        var data = document.getElementById("data");

        kategori_id.addEventListener("click", function () {
        var ObjAjax = new XMLHttpRequest();

        ObjAjax.onreadystatechange = function () {
            if (ObjAjax.readyState == 4 && ObjAjax.status == 200) {
            data.innerHTML = ObjAjax.responseText;
            }
        };

        ObjAjax.open("get", "./sortDiary.php?kategori_id=" + kategori_id.value, true);
        ObjAjax.send();
        });

        // SORTING BY DATE
        var data = document.getElementById("data");
        byDate.addEventListener("click", function () {
        var ObjAjax = new XMLHttpRequest();

        ObjAjax.onreadystatechange = function () {
            if (ObjAjax.readyState == 4 && ObjAjax.status == 200) {
            data.innerHTML = ObjAjax.responseText;
            }
        };

        ObjAjax.open("get", "./sortbyDate.php", true);
        ObjAjax.send();
        });

        // PAGINATION
        var page = 0;  
        $(document).ready(function () { 
            $('#page').click(function () {
                $.get("data.php?page=" + page + "&action=pageDiary", function (resp) {
                    $.each(resp, function (key, value) {
                        $("#data").append(
                            "<div class='d-flex text-muted pt-3'>" +
                            "<svg class='bd-placeholder-img flex-shrink-0 me-2 rounded' width='32' height='32' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: 32x32' preserveAspectRatio='xMidYMid slice' focusable='false'><title>Placeholder</title><rect width='100%' height='100%' fill='#e83e8c'/><text x='50%' y='50%' fill='#e83e8c' dy='.3em'>32x32</text></svg>" +            
                                "<p class='pb-3 text-dark small lh-sm border-bottom'>" +                        
                                    "<strong class='d-block text-gray-dark'>" + value.tanggal + "</strong>" +                      
                                    "<a style='text-decoration:none; color:black;' href='diaryEdit.php?id=" + value.id_judul + "'>" + value.judul + "</a>" +                                                       
                                "</p>" +         
                            "</div>"
                        );
                    });
                    page += 4;
                });
            }).trigger("click");
        });
    </script>
  </body>
</html>