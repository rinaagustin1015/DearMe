<!DOCTYPE html>
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
                    <li class="nav-item"><a class="nav-link" href="wishlist.php" style="font-size: medium; color: white;">Wish List</a></li>
                    <li class="nav-item"><a class="nav-link fw-bolder active" href="todolist.php" style="font-size: medium; color: #598392;">To Do List</a></li>
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
                <a class="blog-header-logo text-white fs-3" style="text-decoration: none;">My to-do list</a>
            </div>
            <div class="mb-5">
                <form id="form" class="">                    
                    <div class="form-group row g-3 mt-2">
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Apa yang akan kamu lakukan ?" required="required">   
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="date form-control text-light" name="" id="" value="">
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" id="kategori" name="kategori" for="kategori">
                                <option selected>Akan dikerjakan</option>
                                <option>Dikerjakan</option>
                                <option>Selesai</option>
                            </select>
                        </div>                        
                    </div>                                      
                    <div class="form-group row mt-3">
                        <div class="col-sm-12">
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Catatan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row g-3 mt-3">                        
                        <div class="text-end mb-5">
                            <a class="btn btn-danger bi bi-x-square-fill mt-4" href="./todolist.php"> Batal</a>
                            <button class="btn btn-create bi bi-send-plus-fill text-dark mt-4" style="background-color:white; margin-right: 11%;" type="submit"> Simpan</button>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>