<?php

namespace cocho;

use cocho\Model\ChatServer;
use cocho\Model\Log;
use cocho\Model\User;



$app->get('/admin/logs', function () {

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Log::getPageSearch($search, $page);
	} else {

		$pagination = Log::getPage($page);
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
				'href' => '/admin/logs?' . http_build_query([
					'page' => $x +1,
					'search' => $search
				]),
				'text' => $x + 1
			]);
		}
	}

	$page = new PageAdmin();


	$page->setTpl("logs", array(
		"logs" => $pagination['data'],
		"search" => $search,
		"pages" => $pages
	));
});

$app->get('/admin/log/view:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$log = Log::get($id);

	$info = "";

	if($log['log_info']);{
		$result = explode(',',$log['log_info']);
		foreach ($result as $key => $value) {
			$info =$info. $value."<br>";
		}
	}

	$log['log_info'] = $info;

	$page->setTpl("log-profile", array(
		"log"=>$log
	));
});


?>