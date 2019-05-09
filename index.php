<!DOCTYPE html>
<html>

<head>
    <title>NOTaCMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/blog.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>

    <?php require("header.php");?>
            <div class="container">
                <div class="row">
                    <center>
                    <?php 
                    if (isset($_GET['q'])) {
                        if (preg_match("/script|img|onerror|onload|svg|onclick|alert|iframe|javascript|onmouseover|src/", strtolower($_GET['q']), $match)) {
                            echo "<h1> You found XSS <3</h1>";
                        } else {
                            echo "<h1> You Searched for: ".$_GET['q']."</h1>";
                        }
                    } else {
                        echo '<h1>Article For You</h1>';
                    }
                    ?>

                    </center>
                        <div class="col-md-9">
                            <?php
                            if (isset($_GET['page'])) {
                                $title = htmlentities(pathinfo($_GET['page'], PATHINFO_FILENAME));
                                echo "<h2 class=\"page-header\">".$title."</h2>";
                                include('article/'.$_GET['page']);
                            } else {
                                echo '
                            <h2 class="page-header">Recent Article</h2>
                            <article>
                                <table class="table">
                                    <thead>
                                        <tr class="info">
                                            <th>Judul Article</th>
                                            <th>Timestamp</th>
                                            <th>Author</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="danger">
                                            <td>Lorem Ipsum</td>
                                            <td>February 30, 2019 9:99 PM</td>
                                            <td>notAauthor</td>
                                            <td><a href="?page=loremipsum.html">Read<a></td>
                                        </tr>
                                        <tr class="info">
                                            <td>Twice</td>
                                            <td>February 29, 2019 10:10 PM</td>
                                            <td>notAauthor</td>
                                            <td><a href="?page=twice.html">Read<a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </article>
                                ';
                            }
                            ?>
                        </div>
                        <div class="col-md-3">
                            <h2 class="page-header">Top Article</h2>
                            <table class="table">
                                <thead>
                                    <tr class="info">
                                        <th>Judul Article</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="danger">
                                        <td>Sam Mael</td>
                                        <td>666</td>
                                    </tr>
                                    <tr class="info">
                                        <td>Snoop Dog</td>
                                        <td>420</td>
                                    </tr>
                                    <tr class="danger">
                                        <td>Bed Cover</td>
                                        <td>69</td>
                                    </tr>
                                    <tr class="info">
                                        <td>Memory Allocation</td>
                                        <td>55</td>
                                    </tr>
                                    <tr class="danger">
                                        <td>CPU Deadlock</td>
                                        <td>31</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>

    <?php require("footer.php"); //import footer?>

</body>

</html>