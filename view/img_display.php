<?php

function getRandomImage() {
    $dir = "./img/sillystock/*.jpg";

    $images = glob( $dir );

    $random = array_rand( $images );

    return $images[$random];
}