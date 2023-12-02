<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center my-4">Weather App</h1>
    <div class="container">

        <?php if (isset($_SESSION["data"])):
            $data = $_SESSION["data"]; ?>
            <div class="row">
                <div class="col-lg-5 col-12 mx-auto d-flex  border justify-content-between align-items-center">
                    <div class="w-25 text-center">
                        <h3>
                            <?= $data['name'] ?>
                        </h3>
                        <h3>
                            <?= $data['country'] ?>
                        </h3>
                    </div>
                    <div class="w-50 d-flex justify-content-around align-items-center">
                        <div class="img w-25 text-center">
                            <img style="width: 100%;" src="<?= $data['conditionicon'] ?>" alt="">
                        </div>
                        <div class="temp-info">
                            <p class="fs-3 m-0 text-center">
                                <?= $data['conditiontxt'] ?>
                            </p>
                            <p class="text-center fs-3">
                                <?= $data['temp_c'] ?>C
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif;
        session_destroy()
            ?>
        <div class="row">
            <div class="col-lg-5 col-12 mx-auto">
                <?php if (isset($_SESSION["erorrs"])): ?>
                    <?php foreach ($_SESSION["erorrs"] as $value): ?>
                        <div class="alert alert-danger text-center" role="alert">
                        <?= $value; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <form action="getdata.php" method="GET" class="text-center my-3 p-5 border rounded">
                    <input class="form-control" type="text" name="serachinput" placeholder="Search By Name">
                    <input type="submit" class="btn btn-primary my-3">
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>