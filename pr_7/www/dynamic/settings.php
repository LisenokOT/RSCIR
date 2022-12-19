<?php

function openmysqli(): mysqli {
    $connection = new mysqli("database", "user", "password", "appDB");
    return $connection;
}