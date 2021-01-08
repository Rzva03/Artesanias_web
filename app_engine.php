
<?php
require_once 'config.php';
importar('core/helpers/http');
importar('core/helpers/template');
importar('core/db/IPersistence');
importar('core/db/DataBase');
importar('core/db/DAO');
importar('core/db/MySql');
//importar('core/db/Postgres');
importar('core/mvc_engine/controller');
importar('core/mvc_engine/front_controller');

#--- Arrancar el motor de la aplicación

FrontController::start();


?>