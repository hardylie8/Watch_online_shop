<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>History</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($product as $product) {
                            ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="<?php echo base_url('images/' . $product['NamaGbr']); ?>" alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p>
                                                    <?php echo $product['NamaProduct']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>
                                            <?php echo "Rp. " . number_format($product['HargaProduct'], 2); ?>
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <?php echo $product['Qty']; ?>
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <?php echo "Rp. " . number_format($product['Total'], 2); ?>
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <?php if ($product['StatusCode'] == "Order") {
                                                echo "Ordered";
                                            } else {
                                                echo $product['StatusCode'];
                                            } ?>
                                        </h5>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->
</main>