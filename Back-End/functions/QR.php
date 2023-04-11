<?php

function QR($text, $filename)
{
    QRcode::png($text, "$filename.png");
}