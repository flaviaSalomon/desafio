<?php
/**
 * Created by PhpStorm.
 * User: Flavia
 * Date: 16-07-2023
 * Time: 0:51
 */

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
<h3 class="text-center" style="padding-top: 10px;padding-bottom: 10px;">
    <span class="fas fa-university " aria-hidden="true"></span>Administrador de Finanzas</h3>
<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/transacciones">
                        <i class='fas fa-cash-register' style='font-size:36px;color:darkslateblue; padding-right: 10px; '></i>
                        <u>Transacciones</u>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<hr><br>
<div class="container">
    @yield('content')
</div>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>

<script>
    //Código para colocar
    //los indicadores de miles mientras se escribe
    //script por tunait!
    function puntitos(donde,caracter)
    {
        pat = /[\*,\+,\(,\),\?,\\,\$,\[,\],\^]/
        valor = donde.value
        largo = valor.length
        crtr = true
        if(isNaN(caracter) || pat.test(caracter) == true)
        {
            if (pat.test(caracter)==true)
            {caracter = "\\" + caracter}
            carcter = new RegExp(caracter,"g")
            valor = valor.replace(carcter,"")
            donde.value = valor
            crtr = false
        }
        else
        {
            var nums = new Array()
            cont = 0
            for(m=0;m<largo;m++)
            {
                if(valor.charAt(m) == "." || valor.charAt(m) == " ")
                {
                    continue;
                }
                else
                {
                    nums[cont] = valor.charAt(m)
                    cont++
                }
            }
        }

        var cad1="",cad2="",tres=0
        if(largo > 3 && crtr == true)
        {
            for (k=nums.length-1;k>=0;k--)
            {
                cad1 = nums[k]
                cad2 = cad1 + cad2
                tres++
                if((tres%3) == 0)
                {
                    if(k!=0){
                        cad2 = "." + cad2
                    }
                }
            }
            donde.value = cad2
        }
    }

</script>