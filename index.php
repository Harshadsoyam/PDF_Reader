<?php

    include('class.pdf2text.php.php');
    $text=NULL;
    if(isset($_POST["submit"]))
{
    $file=$_FILES["pdffile"]["tmp_name"];
    $a = new PDF2Text();
    $a->setFilename($file); 
    $a->decodePDF();
    $text= $a->output(); 

    $start=strpos($text,'Information');
    $start+=11;
    $end=strpos($text,'Class');
    $end-=6;
    $program=substr($text,$start,$end-$start);


    $start=strpos($text,'Class');
    $end=strpos($text,'Code');
    $end-=10;
    $classem=substr($text,$start,$end-$start);

    $start=strpos($text,'Code');
    $start-=7;
    $end=strpos($text,'Name');
    $end-=11;
    $code=substr($text,$start,$end-$start);

    $start=strpos($text,'Name');
    $start-=7;
    $end=strpos($text,'Requisites');
    $end-=9;
    $name=substr($text,$start,$end-$start);
    
    $start=strpos($text,'Requisite');
    $start-=9;
    $end=strpos($text,'Teaching');
    $requi=substr($text,$start,$end-$start);

    $start=strpos($text,'Objectives');
    $start-=8;
    $end=strpos($text,'Outcome');
    $end-=8;
    $obj=substr($text,$start,$end-$start);

    $start=strpos($text,'Outcome');
    $start-=7;
    $end=strpos($text,'Module');
    $outcome=substr($text,$start,$end-$start);


}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home</title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <div class="container-fluid">
        <form
          action="index.php"
          method="post"
          style="width: 400px;  margin:auto; margin-top:30px;"
          class="p-4 bg-light"
          enctype="multipart/form-data"
        >
        <div class="mb-3 fs-2 text-center">Upload File</div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Select PDF File </label>
            <input class="form-control" type="file" name="pdffile" id="formFile">
          </div>
        
        <button type="submit" name='submit' class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container-fluid " style="margin-top:50px; width:90%">
      <?php
        if($text!=NULL)
        {

        echo "$program <br>";
        echo "$classem <br>";
        echo "$code <br>";
        echo "$name <br>";
        echo "$requi <br>";
        echo "$obj <br>";
        echo "$outcome <br>";
        }
      ?>
    </div>


</div>

  </body>
</html>