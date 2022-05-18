    <?php
        session_start();

    ?>

<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Komparator twojego Komputera !</title>

            <style>
                html
                {
                    
                    font-family: Arial;
                    background: black;

                }
                
                body
                {
                font-family: Arial;
                width: 1200px;
                margin: 0 auto;
                background-color:white ;
                padding: 0 200px 2000px 200px;
                }
                
                #baner {
            text-align: right;

            /* animation properties */
            -moz-transform: translateX(-100%);
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
            
            -moz-animation: my-animation 15s linear infinite;
            -webkit-animation: my-animation 15s linear infinite;
            animation: my-animation 15s linear infinite;
            }

            /* for Firefox */
            @-moz-keyframes my-animation {
            from { -moz-transform: translateX(-100%); }
            to { -moz-transform: translateX(100%); }
            }

            /* for Chrome */
            @-webkit-keyframes my-animation {
            from { -webkit-transform: translateX(-100%); }
            to { -webkit-transform: translateX(100%); }
            }

            @keyframes my-animation {
            from {
                -moz-transform: translateX(100%);
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
            }
            to {
                -moz-transform: translateX(-100%);
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }
            }

                h1 
                {                   
                font-family: Arial;
                margin: 0;
                padding: 25px 0;
                color: #00539F;
                
                }
                
                h2
                {
                font-family: Arial;  
                }
                
                li
                {
                font-family: Arial; 
                }
                

            </style>
            
    </head>

<body>

 <div id="baner"><h1>Witaj na stronie pomożemy tobie dobrać komponenty do twoich wymagań</h1></div>
<br>
<br>
 <h2><center>Dlaczego my?</center></h2>
<ul>
    <li>
    Dobierzesz idalna karte graficzna do swojego procesora
    </li>
<br>
    <li>
    Wybierzesz spośrod wielu kart <a href="https://www.amd.com">amd</a> lub <a href="https://www.nvidia.com">nvidia</a>
    </li>
<br>
    <li>
    Wiele procesorów od <a href="https://www.intel.pl/content/www/pl/pl/products/details/processors.html">intel</a> lub <a href="https://www.amd.com/en/processors">amd</a>
    </li>
</ul>
<br>
<center>
<button onclick="location.href='komparator.php'" type="button">Przejdź dalej!</button>
<center>
<script>
        
        <script>
</body>


</html>
