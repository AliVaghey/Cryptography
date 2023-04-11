<?php

class Controller
{
    static public function autoload()
    {
        $apps = [
            'functions/multiplicative inverse.php',
            'functions/Euclidean-Algorithm.php',
            'functions/primitive-Roots.php',
            'functions/Diffie-Hellman.php',
            'functions/encode-decode.php',
            'functions/Fast-Powering.php',
            'functions/Miller Rabin.php',
            'functions/brute-force.php',
            'functions/Signings.php',
            'functions/Elgamal.php',
            'functions/Seasar.php',
            'functions/RSA.php',
            'functions/Fm.php',
            'libs/qrlib.php',
            'functions/QR.php',
        ];
        foreach($apps as $app)
            include $app;
    }

    static public function menu()
    {
        
    }
}