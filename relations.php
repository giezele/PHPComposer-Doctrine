<?php 
namespace Models;
include_once "bootstrap.php";

use \Doctrine\Common\Util\Debug;


// Helper functions
function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}
// Many:1 unidirectional
// print("<pre>");
// $user = $entityManager->find('Models\User', 1);
// // print($user->getAddress()->getAddressValue());
// // Debug::dump($user);
// // Debug::dump($user->getAddress());
// Debug::dump($user->getAddress()->getAddressValue());
// print("</pre>");

// 1:1 bidirectional
print("<pre>");
$customer = $entityManager->find('Models\Customer', 1);
Debug::dump($customer->getCart());
Debug::dump($customer->getCart()->getCustomer());
print("</pre>");

