<?php
/**
 * Created by PhpStorm.
 * User: Boss
 * Date: 24.01.2019
 * Time: 18:57
 */
?>
<div class="container">
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Your shopping cart</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading no-line">
            <span class="page-heading-title2">Shopping Cart Summary</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-order">
            <ul class="step">
                <li class="current-step"><span>01. Summary</span></li>
                <li><span>02. Shipping</span></li>
            </ul>
            <div class="heading-counter warning">Your shopping cart contains:
                <span>1 Product</span>
            </div>
            <div class="order-detail-content">
                <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">Product</th>
                            <th>Description</th>
                            <th>Avail.</th>
                            <th>Unit price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th  class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="images/product-100x122.jpg" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="#">Frederique Constant </a></p>
                                <small class="cart_ref">SKU : #123654999</small><br>
                                <small><a href="#">Color : Beige</a></small><br>
                                <small><a href="#">Size : S</a></small>
                            </td>
                            <td class="cart_avail"><span class="label label-success">In stock</span></td>
                            <td class="price"><span>61,19 €</span></td>
                            <td class="qty">
                                <input class="form-control input-sm" type="text" value="1">
                                <a href="#"><i class="fa fa-caret-up"></i></a>
                                <a href="#"><i class="fa fa-caret-down"></i></a>
                            </td>
                            <td class="price">
                                <span>61,19 €</span>
                            </td>
                            <td class="action">
                                <a href="#">Delete item</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="images/product-100x122.jpg" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="#">Frederique Constant </a></p>
                                <small class="cart_ref">SKU : #123654999</small><br>
                                <small><a href="#">Color : Beige</a></small><br>
                                <small><a href="#">Size : S</a></small>
                            </td>
                            <td class="cart_avail"><span class="label label-success">In stock</span></td>
                            <td class="price"><span>61,19 €</span></td>
                            <td class="qty">
                                <input class="form-control input-sm" type="text" value="1">
                                <a href="#"><i class="fa fa-caret-up"></i></a>
                                <a href="#"><i class="fa fa-caret-down"></i></a>
                            </td>
                            <td class="price">
                                <span>61,19 €</span>
                            </td>
                            <td class="action">
                                <a href="#">Delete item</a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3">Total products (tax incl.)</td>
                            <td colspan="2">122.38 €</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td colspan="2"><strong>122.38 €</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="cart_navigation">
                    <a class="prev-btn" href="#">Continue shopping</a>
                    <a class="next-btn" href="#">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>