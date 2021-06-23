<style>
    .text-color {
        color: #415094;
    }
</style>
<main>
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Order</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <form method="post" action="<?= site_url('/addproduct/add'); ?>">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Buyer Id</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                                <?php
                                $i = 1;
                                array_multisort(array_column($order, 'StatusCode'), SORT_DESC, $order);
                                foreach ($order as $product) {
                                ?>
                                    <tr>
                                        <td class="col-md-1">
                                            <h5>
                                                <?php echo $i++; ?>
                                            </h5>
                                        </td>
                                        <td class="col-md-2">
                                            <div class="media">
                                                <!-- <div class="d-flex">
                                                        <img src="assets/img/gallery/card1.png" alt="" />
                                                    </div> -->
                                                <div class="media-body">
                                                    <p>
                                                        <?php echo $product['NamaProduct']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-md-1">
                                            <h5>
                                                <?php echo  $product['IdUser']; ?>
                                            </h5>
                                        </td>
                                        <td class="col-md-1">
                                            <h5>
                                                <?php echo  $product['Qty']; ?>
                                            </h5>
                                        </td>
                                        <td class="col-md-3">
                                            <h5>
                                                <?php echo "Rp. " . number_format($product['Total'], 2); ?>
                                            </h5>
                                        </td>
                                        <td class="col-md-1">
                                            <h5>
                                                <?php if ($product['StatusCode'] == "Order") {
                                                    echo "Ordered";
                                                } else {
                                                    echo $product['StatusCode'];
                                                } ?>
                                            </h5>
                                        </td>

                                        <td class="col-md-3">
                                            <a class="btn_1" href="<?= site_url('/order/update/' . $product['IdCart']); ?>">Deliver</a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
    </section>
</main>