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
                  <input class="form-control me-2" type="search" placeholder="Cari...">
                </form>
              </div>
            </div>
        </nav>
    </header>

    <main class="px-3 py-5">
        <div class="container mt-5 mb-4 shadow-lg rounded" style="background-image: url('asset/bg-diary.png'); background-size: 100% 100%;">
            <form id="form">
                <div class="form-group row g-3 mt-3">
                    <div style="margin-top: 7%;">
                        <div class="col-3 text-center">
                            <a class="blog-header-logo fs-3" style="color:#598392; text-decoration: none;">My Note</a>
                        </div>
                    </div>
                        <label class="col-sm-1 col-form-label" for="title"></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="lastName" placeholder="Judul" value="" required>
                        </div>             
                    <div class="col-md-2">
                        <select class="form-select" id="kategori" name="kategori" for="kategori">
                            <option selected>Mood</option>
                            <option>Bahagia</option>
                            <option>Marah</option>
                            <option>Sedih</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="date" class="date form-control text-light" name="" id="" value="">
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-1 mt-3 col-form-label" for="title"></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" cols="100" rows="20" placeholder="Tulis disini..."></textarea>
                        </div>
                    </div>
                    <div class="text-end my-auto mb-5">                        
                        <a class="btn btn-danger bi bi-x-square-fill px-3 mt-4" href="./diary.php"> Batal</a>
                        <button class="btn btn-create bi bi-send-plus-fill px-3 mt-4" style="margin-right: 11%;" type="submit"> Simpan</button>
                    </div>
                </div>                      
            </form>            
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>