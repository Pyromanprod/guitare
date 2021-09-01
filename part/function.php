<?php

//vérification de la norme RGPD sur les mdp

function passwordRGPD($passATester)
{
    //les variables ici renvoie false si elle ne contienne pas : majuscul miniscul etc...

    $ucl = preg_match('/[A-Z]/', $passATester); //Uppercase Letter
    $lcl = preg_match('/[a-z]/', $passATester); //Lowercase Letter
    $dig = preg_match('/\d/', $passATester); //Numeral
    $nos = preg_match('/\W/', $passATester); //Spécial char
    $nbChar = strlen($passATester);

    //Si une des variable n'est pas true la fonction renvoie false
    // Si tout et vérifié elle renvoie true
    if (
        $ucl && $lcl && $dig && $nos && $nbChar >= 7
    ) {
        return true;
    } else {
        return false;
    }
}


function isValidDate($date, $format = 'Y-m-d')
{
    $dt = DateTime::createFromFormat($format, $date);
    return $dt && $dt->format($format) === $date;
}
