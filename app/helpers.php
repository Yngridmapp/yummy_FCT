<?php

use App\Models\User;


//Funcion global para usar en toda la app
function roleName(User $user)
{
    $rol = $user->rol->type;
    $userName = $user->name;
    $rolName = "$userName-$rol";

    return $rolName;
}
