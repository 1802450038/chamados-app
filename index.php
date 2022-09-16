<?php

use cocho\Model\User;
use cocho\PageAdmin;


session_start();
require_once("vendor/autoload.php");

use Slim\Slim;

$app = new Slim();

$app->config('debug', true);


require_once("admin-user-actions.php");
require_once("admin-users.php");
require_once("admin-computers.php");
require_once("admin-os-computers.php");



// require_once("functions.php");


$app->get('/', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");
});

$app->get('/admin', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index", array());

});

$app->get("/admin/message", function () {

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$tipo = $_GET['tipo'];
	$sucesso = $_GET['sucesso'];
	$mensagem = $_GET['mensagem'];

	$page->setTpl("message", array(
		"tipo" => $tipo,
		"resposta" => $mensagem,
		"sucesso" => $sucesso
	));
});

$app->run();
