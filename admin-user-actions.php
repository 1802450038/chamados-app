<?php

namespace cocho;
use cocho\Model\User;


$app->get('/login', function () {

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("login");
});

$app->get('/logout', function () {

	User::verifyLogin();

	User::logout();

	header("Location:/");
	exit;
});

$app->get('/forgot', function () {

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("forgot");
});

$app->get("/forgot/sent", function () {

	$page = new Page([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("forgot-sent");
	exit;

});

$app->get("/forgot/reset", function () {

$page = new Page([
    "header" => false,
    "footer" => false
]);

$page->setTpl("forgot-reset", array(
    "code" => $_GET["code"]
));
exit;
});

$app->post('/admin/login', function () {

	User::login($_POST["user_login"], $_POST["user_password"]);

	header("Location:/admin");
	exit;
});


$app->post("/forgot", function () {

	// User::getForgot($_POST["user_email"]);

	// header("Location: /forgot/sent");
	// exit;
});

$app->post("/forgot/reset", function () {


});

?>