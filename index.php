<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Google Book API</title>
</head>
<body>


<?php

require './src/api.php';
?>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="card col-10 col-md-6 px-0">
            <div class="card-header">
                search
            </div>
            <div class="card-body d-flex justify-content-center">
                <div class="col-10">
                    <form method="POST" action="index.php" class="">
                        <div class="form-group">
                            <label for="search">Name or ISBN</label>
                            <input class="form-control" type="text" name="search"  id="search" required>
                        </div>
                        <button class="btn btn-primary justify-content-end" value="search" name="submit" type="submit">Find a book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <ul class="list-unstyled align-self-center">
    <?php if(!empty($retour)) {
        if (isset($retour['items'])) {
            foreach($books as $book) {
                ?>
                <li class="media mb-2">
                    <img src="<?= $book['img_couverture'] ?>" alt="..." class="img-responsive mr-3">
                    <div class="media-body">
                        <h3 class="flow-text"><?= $book['titre'] ?></h3>
                        <h4 class="flow-text"><?= $book['auteur']?></h4>
                        <ul class="list-unstyled">
                            <li>Edition : <?= $book['edition'] ?> </li>
                            <li>Nb de pages : <?= $book['pages'] ?> </li>
                        </ul>
                    </div>
                </li>
                <?php
            }
        } else {
            ?>
           <li class="media">No result for your search</li>
        <?php
        }
    }
    ?>
    </ul>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>