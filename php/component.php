<?php

function products($productName, $productPrice, $productImage, $productId) {
    $element = "
<div class=\"col-md-3 col-sm-6 my-3\">
    <form action=\"index.php\" method=\"post\">
        <div class=\"card shadow\">
            <div>
                <img src=\"$productImage\" alt=\"Headsets\" class=\"img-fluid card-img-top\">
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">$productName</h5>
                <p class=\"card-text\">
                    Bla Bla Bla
                </p>
                <h5>
                    <small><s class=\"text-secondary\">$620</s></small>
                    <span class=\"price\">$$productPrice</span>
                </h5>

                <button class=\"btn btn-warning my-3\" type=\"submit\" name=\"add\">Add to Cart</button>
                <input type=\"hidden\" name=\"product_id\" value=\"$productId\">
            </div>
        </div>
    </form>
</div>
";
echo $element;
}

function cartElement($productImage, $productName, $productPrice, $productId) {
    $cart = "
    <form action=\"cart.php?action=remove&id=$productId\" method=\"POST\" class=\"cart-items py-2\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white py-2\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=\"$productImage\" alt=\"Headsets\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productName</h5>
                                <small class=\"text-secondary\">Seller: Baron</small>
                                <h5 class=\"pt-2\">$$productPrice</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\">-</button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
";
    echo $cart;
}
?>