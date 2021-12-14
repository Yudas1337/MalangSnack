<?php
require_once __DIR__ . "/../../../middleware/sessionMiddleware.php";
require_once __DIR__ . "/../../../controllers/UserController.php";
sessionMiddleware::isNotLoggedIn();
UserController::logout();
