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
                    <h1 class="h6 mb-0 text-dark">Apa yang perlu kamu lakukan?</h1>
                </div>
                <div class="col-auto">
                    <a class="btn btn-secondary me-md-3" href="formTodolist.php" style="background-color: #598392;"><span><i class="bi bi-bookmark-plus-fill text-light"></i></span> Tambahkan</a>
                </div>
            </div>
        </div>
        
        <div class="bg-list shadow-lg rounded px-3">
            <div class="d-flex px-2 align-items-center">
                <div class="col-12 mt-2">
                    <a class="blog-header-logo fs-5" style="color: white;  text-decoration: none;"><button class="btn bi bi-funnel-fill" style="color: black;" id="byDate" name="byDate" for="byDate"></button> Daftar Pekerjaan :</a>
                </div>    
            </div>
            <div class="bg-light rounded mt-3 px-3">
                <table class="table table-borderless text-dark">
                    <thead>
                      <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">TO DO</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    
                    <tbody id="data" name="data">
                    <?php
                    include "config.php";
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
                    </tbody>
                                          
                </table>
            </div>            
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        // SEARCHING TODOLIST
        var ngetik = document.getElementById("ngetik");
        var data = document.getElementById("data");

        ngetik.addEventListener("keyup", function () {
        var ObjAjax = new XMLHttpRequest();

        ObjAjax.onreadystatechange = function () {
            if (ObjAjax.readyState == 4 && ObjAjax.status == 200) {
            data.innerHTML = ObjAjax.responseText;
            }
        };

        ObjAjax.open("get", "./searchTodolist.php?ngetik=" + ngetik.value, true);
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

        ObjAjax.open("get", "./sortTodolist.php", true);
        ObjAjax.send();
        });
    </script>

</body>
</html>