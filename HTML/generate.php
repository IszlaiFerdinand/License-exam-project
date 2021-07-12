<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Completare formulare auto</title>
    <link rel="shortcut icon" type="image/ico" href="../PICTURES/drpcivlogo.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Completare acte auto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler77" aria-controls="" aria-expanded="false" aria-label="Toggle navigation"> 
            <div class="dropdown" style="display: inline-block;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink78" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Selectare limbă</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink78"> 
                    <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ro"></span> Română</a> 
                    <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-hu"></span> Magyar</a> 
                    <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-us"></span> English</a>
                </div>
            </div>
        </button>
        
            <a class="navbar-brand order-md-last mx-auto" href="https://www.drpciv.ro/" target="_blank">
                <img src="../PICTURES/drpcivlogo.png" width="40" height="40" class="d-inline-block align-top" alt="">
                Siteul oficial DRPCIV
            </a>

            <div class="collapse navbar-collapse " id="navbarToggler77">
                    <div class="d-lg-block d-none dropdown">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink78" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Selectare limbă</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink78"> 
                        <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ro"></span> Română</a> 
                        <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-hu"></span> Magyar</a> 
                        <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-us"></span> English</a> 
                    </div>
                </div> 
            </div>
    </nav>
        <?php
            use Classes\GeneratePDF;

            require_once '../vendor/autoload.php';

            $date = date("d.m.Y");
            $seller = $_POST["firstname2"]." ".$_POST["lastname2"]." ".$_POST["CNP2"];

            if($_POST["tip"] == "inmatriculare" || $_POST["tip"] == "inmatriculare temporara" || $_POST["tip"] == "transcriere" || $_POST["tip"] == "autorizare"){
                $mod = "cumparare";
            }
            else $mod = "alt mod";

            $formdata = [
                'cumparator' => $_POST["firstname"]." ".$_POST["lastname"],
                'CNP' => $_POST["CNP1"],
                'loc' => $_POST["loc"],
                'jud' => $_POST["country"],
                'str' => $_POST["str"],
                'nr'  => $_POST["nr"],
                'bl'  => $_POST["bl"],
                'sc'  => $_POST["sc"],
                'et'  => $_POST["et"],
                'ap'  => $_POST["ap"],
                'e-mail'  => $_POST["e-mail"],
                'tel'  => $_POST["tel"],
                $_POST["tip"] => "Yes",
                'zile'  => $_POST["days"],
                'buc'  => $_POST["pcs"],
                'marca'  => $_POST["brand"],
                'tip'  => $_POST["type"],
                'serie' => $_POST["idnum"],
                'an' => $_POST["year"],
                'numar de inmatriculare'  => $_POST["idnum1"],
                'Data'  => $date,
                'schimb' => $mod,
                'vanzator' => $seller,
                'Data1' => $date
            ];
                
            $pdf = new GeneratePDF;
            $response = $pdf -> generate($formdata);

            $fullname = $_POST["firstname"]." ".$_POST["lastname"];
            echo '
            <div class="text-center">
                <h2 class="my-2">Mulțumim pentru completare '.$fullname.'!</h2><br>
                <h2>Descarcă documentul de <a href="../Completed/'.$response.'" download>aici</a></h2>
            </div>  
            ';
            
            



        ?>
</body>
</html>