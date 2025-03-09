<?php
require_once(__DIR__ . '/../../config/function.php');
session_destroy();
redirectToRoute('/login');
