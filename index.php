<?php

slowFunction('secret-password');

function slowFunction(string $password): void
{
    // To make this function "slow" to have more interesting data in Tideways
    // we encrypt passwords with a slow algorithm
    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
    password_verify('rasmuslerdorf', $hash);

    extraSleep();
}

// Extra sleep to have more interesting data in Tideways
function extraSleep()
{
    sleep(1);
}
