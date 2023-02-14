<?php

namespace cocho;

use cocho\Model\User;
use cocho\Model\Delivery;
use cocho\Model\Os;

$app->get("/admin/deliveries", function () {

	User::verifyLogin();

	$sector = (isset($_GET['sector'])) ? $_GET['sector'] : "";
	$addressee = (isset($_GET['addressee'])) ? $_GET['addressee'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($sector != '' || $addressee != '') {
		$pagination = Delivery::getPageSearch($sector, $addressee, $page);
	} else {
		$pagination = Delivery::getPage($page);
	}

	$pages = [];

	$total = $pagination['pages'];

	$extra = 2;

	if($page == 1) {
		$extra = 5;
	}

	for ($x = $page - 3; $x < $page + $extra; $x++) {
		if ($x >= 0 && $x < $total) {

			array_push($pages, [
				'href' => '/admin/deliveries?' . http_build_query([
					'page' => $x +1,
					'sector' => $sector,
					'addressee'=> $addressee
				]),
				'text' => $x + 1
			]);
		}
	}


	$page = new PageAdmin();

	$page->setTpl("delivery-delivered", [
		"deliveries" => $pagination['data'],
		"sector" => $sector,
		"addressee" => $addressee,
		"pages" => $pages
	]);
});


$app->get('/admin/delivery/delete:id', function ($id) {

	User::verifyLogin();

	Delivery::delete($id);

	header("location: /admin/deliveries");
	exit;
});

$app->get('/admin/delivery/create', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("delivery-create", array(
	));
});


// ADD ADMIN COMPUTER PUBLIC PROFILE

$app->get('/admin/delivery/profile:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	
	$delivery = Delivery::get($id);

	$os = Os::getByComputerId($delivery["computer_id"]);

	$user_id = $user_id = $_SESSION[User::SESSION]["user_id"];


	$page->setTpl("delivery-profile", array(
		"delivery" => $delivery,
		"user_id" => $user_id,
		"os" => $os
	));
});



$app->post('/admin/delivery/create', function () {
 
	User::verifyLogin();

	$delivery = new Delivery();

	$delivery->setData($_POST);

	$res = $delivery->create();
	
	header("location: /admin/deliveries");
	exit;
});

