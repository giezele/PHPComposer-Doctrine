<?php
include_once 'bootstrap.php';


// Helper functions
function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}


// Add new product
if(isset($_GET['name'])){
    $product = new Models\Product();
    $product->setName($_GET['name']);
    $entityManager->persist($product);
    $entityManager->flush();
    redirect_to_root();
}

// Delete product
if(isset($_GET['delete'])){
    $product = $entityManager->find('Models\Product', $_GET['delete']);
    $entityManager->remove($product);
    $entityManager->flush();
    redirect_to_root();
}

// Update
if(isset($_POST['update_name'])){
    $user = $entityManager->find('Models\Product', $_POST['update_id']);
    $user->setName($_POST['update_name']);
    $entityManager->flush();
    redirect_to_root();
}


print("<pre>Find Product by id: " . "<br>");
// $product = $entityManager->find('Product', 66);

// ... SELECT + WHERE ID
$product = $entityManager->find('Models\Product', 3); // jei naudojame namespaceus
$product !== NULL ? print $product->getId() . ' ' . $product->getName() : '';
print("</pre><hr>");

print("<pre>Find Product(s) by other property (name): " . "<br>");
// ... SELECT + WHERE Name
$products = $entityManager->getRepository('Models\Product')->findBy(array('name' => 'Batai'));
$products[0] !== NULL ? print $products[0]->getId() . ' ' . $products[0]->getName() : '';
print("</pre><hr>");

print("<pre>Find Product(s) by other property (name): " . "<br>");
$products = $entityManager->getRepository('Models\Product')->findBy(array('name' => 'Batai'));
print("<table>");
foreach($products as $p)
    print("<tr>" 
            . "<td>" . $p->getId()  . "</td>" 
            . "<td>" . $p->getName() . "</td>" 
            . "<td><a href=\"?delete={$p->getId()}\">DELETE</a></td>" 
            . "<td><a href=\"?updatable={$p->getId()}\">UPDATE</a></td>"
        . "</tr>");
print("</table>"); 
print("</pre><hr>");

//sort
print("<pre>Find Product(s) by other property (name) sorted by another property (id): " . "<br>");
$products = $entityManager->getRepository('Models\Product')->findBy(array('name' => 'batai'), array('id' => 'DESC'));
print("<table>");
foreach($products as $p)
    print("<tr>" 
            . "<td>" . $p->getId()  . "</td>" 
            . "<td>" . $p->getName() . "</td>" 
            . "<td><a href=\"?delete={$p->getId()}\">DELETE</a></td>" 
            . "<td><a href=\"?updatable={$p->getId()}\">UPDATE</a></td>"
        . "</tr>");
print("</table>"); 
print("</pre><hr>");

//find all
print("<pre>Find all Products: " . "<br>");
$products = $entityManager->getRepository('Models\Product')->findAll();
print("<table>");
foreach($products as $p)
    print("<tr>" 
            . "<td>" . $p->getId()  . "</td>" 
            . "<td>" . $p->getName() . "</td>" 
            . "<td><a href=\"?delete={$p->getId()}\">DELETE</a>☢️</td>" 
            . "<td><a href=\"?updatable={$p->getId()}\">UPDATE</a>♻️</td>"
        . "</tr>");
print("</table>"); 
print("</pre><hr>");

//update
if(isset($_GET['updatable'])){
    $product = $entityManager->find('Models\Product', $_GET['updatable']);
    print("<pre>Update Product: </pre>");
    print("
        <form action=\"\" method=\"POST\">
            <input type=\"hidden\" name=\"update_id\" value=\"{$product->getId()}\">
            <label for=\"name\">Product name: </label><br>
            <input type=\"text\" name=\"update_name\" value=\"{$product->getName()}\"><br>
            <input type=\"submit\" value=\"Submit\">
        </form>
    ");
    print("<hr>");
}

print("<pre>Add new product: " . "</pre>");
?>
<form action="" method="GET">
  <label for="name">Product name: </label><br>
  <input type="text" name="name" placeholder="new product"><br>
  <input type="submit" value="Submit">
</form> 
<hr>

<pre style="display: inline">Once you understood these, you can start working with relations - click</pre>
<a href="Relations"><pre style="display: inline">here</pre></a><pre style="display: inline"> when you are ready 🔥🔥🔥</pre>
