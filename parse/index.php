<?php
//This variable takes all the data from the given JSON file.
$jsondata = file_get_contents("2020-01-02.json");
//This variable converts that data into an object.
$json = json_decode($jsondata,true);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Parsing JSON</title>
</head>

<!-- I have used Bootstrap 4 to create a responsive layout for the web page, by using columns and rows to fit all of the elements into a grid that adjusts to the screen size. -->

<body class="bg-light">
<h1 class="page-header col-12 bg-primary text-center py-1 shadow-sm" style="color:white;">Parsing JSON</h1>

<div class="row ml-2 ml-md-0">
    <div class="col-11 col-md-6 offset-md-3 card py-2 shadow mb-2">
        <h2>Welcome</h2>
        <p>
            This page contains information about various articles taken from a JSON file. The sections below are organised by Title, Image and URL (Which also contains text taken from the given article).
        </p>
    </div>
</div>

<div class="row ml-2 ml-md-0">
    <!-- The for loop below goes through the indices in the JSON object. The for loop starts from 2 as the first 2 items do not contain 'attachments' arrays, which is where the article info is stored. -->
    <?php for ($x = 2; $x <= 10; $x++) { ?>
    <div class="col-11 col-md-6 offset-md-3 card py-2 shadow mb-2">
        <div class="pb-5">
            <!-- Here I have used 'str_replace' to pull the text from the array while discarding the parts that don't need to be displayed -->
            <h4><?php echo str_replace(" - MCV/Develop","",$json[$x]['attachments'][0]['title']); ?></h4>
            <img class="w-25" src="<?php print_r($json[$x]['attachments'][0]['image_url']) ;?>">
            <br>
            <a href="<?php echo print_r($json[$x]['attachments'][0]['title_link']); ?>">
                <?php echo str_replace("1","",$json[$x]['attachments'][0]['text']); ?>
            </a>
        </div>
    </div>
    <?php } ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>