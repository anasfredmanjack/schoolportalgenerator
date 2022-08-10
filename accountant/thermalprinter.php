<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <title>Receipt example</title>
        <style> 
        
        @import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700");
@import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700");
@import url(../scss/icons/font-awesome/css/font-awesome.min.css);
@import url(../scss/icons/simple-line-icons/css/simple-line-icons.css);
@import url(../scss/icons/weather-icons/css/weather-icons.min.css);
@import url(../scss/icons/linea-icons/linea.css);
@import url(../scss/icons/themify-icons/themify-icons.css);
@import url(../scss/icons/flag-icon-css/flag-icon.min.css);
@import url(../scss/icons/material-design-iconic-font/css/materialdesignicons.min.css);
@import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700");
@import url(../css/spinners.css);
@import url(../css/animate.css);
        
        
            @page { margin: 0 }
            body{
                font-family: "Poppins", sans-serif;
            }
         
            p{
                font-size: 14px; 
                
            } 
            .centered {
                text-align: center;
                align-content: center;
                display: block;
                clear: both;
                width: 155px; 
                font-weight: bolder;
            }
            
            .ticket {
                width: 200px;
                max-width: 200px;
            }
            
            img {
                max-width: 90%;
                width: 90%;
            }
            
            @media print {
                .hidden-print,
                .hidden-print * {
                    display: none !important;
                }
            }
        </style>
    </head>
    <body>
        <div class="ticket">
            <img src="./logo.jpg" alt="Logo">
            <p class="centered" style="text-align:center;">Lyngra Private Montessori School</p>
                <p class="centered" style="text-align: center; font-weight: normal; font-size: 11px;">28 Ajira Crescent, <br>Godewi/One-man Village,
                <br>Off Abuja/Keffi Road, Nassarawa State.</p>
                <p class="centered">08035861522</p>
             
                    <p>
                        <strong>--------------------</strong><br>
                        <strong>STUDENT:</strong><br>
                         Anyafeoluwa Owolabi
                    </p> 
                    <p>
                        <strong>--------------------</strong><br>
                        <strong>TRANSACTION NO:</strong><br>
                        FPRN0123819283021 
                    </p> 
                    <p>
                        <strong>--------------------</strong><br>
                        <strong>DEPOSITOR:</strong><br>
                        Mr Owolabi 
                    </p> 
                    <p>
                        <strong>--------------------</strong><br>
                        <strong>CLASS:</strong><br>
                        KG 2 PEACE 
                    </p> 
                    <p>
                        <strong>--------------------</strong><br>
                        <strong>PAYMENT METHOD:</strong><br>
                        Transfer 
                    </p> 
                    <p>
                        <strong>--------------------</strong><br>
                        <strong>SESSION:</strong><br>
                        2021/2022
                    </p> 
                    <p>
                        <strong>--------------------</strong><br>
                        <strong>DATE OF INVOICE:</strong><br>
                        February 17, 2022
                    </p> 
                    <p>
                        <strong>--------------------</strong><br>
                        <strong>TOTAL AMOUNT:</strong><br>
                        N33,500.00</strong>
                    </p> 
                    <p> 
                        <strong>--------------------</strong><br>
                        <strong>OLD DEBT B/F:</strong><br>
                        N0.00
                    </p> 
                    <p>
                        <strong>--------------------</strong>
                    </p>  
            <p style="font-size: 10px; font-style: italicize; text-align: center;">This is a temporary receipt pending verification.
                <br>Contact Us: lygraschool104@gmail.com</p>
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script>
    </body>
</html>