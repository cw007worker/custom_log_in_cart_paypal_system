<?php
/* 
Template Name: Contracts
*/  
$_email = $_SESSION['apo_log_mail'];
global $seconddb;

if ( !isset($_SESSION['apo_log_tkn']) ){
    header("Location: /");
}

get_header();   


?>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }


   
    input[type=text],
    input[type=password],
    input[type=email] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }


    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }


    .registerbtn, .loginBtn {
        background-color: #383aff;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover, .loginBtn:hover {
        opacity: 1;
    }

    a {
        color: dodgerblue;
    }

    .signin {
        background-color: #f1f1f1;
        text-align: center;
        padding: 30px;
    }
    .nav_sec li{
        padding: 10px;
        margin: 5px;
        float: right;
        background-color: white;
        border: 1px solid grey;
    } 
</style>
<div style="padding-bottom: 44px;">
<ul class="nav_sec" style="text-align: center">
    <li><a href="/appointments">Appointments</a></li>
  <li><a href="/billing">Billing</a></li>
</ul>
</div>


<?php get_footer(); ?>