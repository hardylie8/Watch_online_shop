<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Watch Shop</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">

                <img class="img-fluid" src="<?php echo base_url('images/' . $product[0]['NamaGbr']); ?>" alt="">

                <div class=" col-lg-8">
                    <div class="single_product_text text-center">
                        <h3><?php echo $product[0]['NamaProduct'] ?></h3>
                        <h4>
                            <?php echo "Rp " . number_format($product[0]['HargaProduct'], 2) . ",-"; ?>
                        </h4>
                        <p>
                            <?php echo $product[0]['DescProduk'] ?>
                        </p>
                        <div class="card_area">
                            <form action="<?= site_url('/details/insert'); ?>" method="post">
                                <div class="product_count_area">
                                    <p class="py-2">Quantity</p>
                                    <div class="product_count d-inline-block align-self-stretch row" style="max-height: 50px;">
                                        <span class="product_count_item inumber-decrement col p-0" onclick="TampilHarga('kurang')"> <i class="ti-minus"></i></span>
                                        <input class="product_count_item input-number col h-100" id="Qty" type="text" name="Qty" required value="0" min="0" max="10">
                                        <span class="product_count_item number-increment col" onclick="TampilHarga('tambah')"> <i class="ti-plus"></i></span>
                                    </div>
                                    <p class="py-2" id="TextHarga">
                                        Rp 0,00
                                    </p>
                                    <input hidden type="text" value="<?php echo $product[0]['IdProduct']; ?>" id="IdProduct" name="IdProduct">
                                    <input hidden type="text" id="TotalBox" name="TotalBox">
                                </div>
                                <div style="margin-left:45px" class="add_to_cart">
                                    <input style="cursor:pointer" <?php if (!isset($name)) {
                                                                        echo 'onclick="peringatan()" type="button" ';
                                                                    } else {
                                                                        echo 'type="submit"';
                                                                    } ?> class="btn_3" value="add to cart">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->
</main>
<script>
    let peringatan = () => {
        alert("Anda Perlu untuk login/registrasi untuk berbelanja.");
    }
    let TampilHarga = (operasi) => {
        let x = document.getElementById("Qty").value;
        let x1 = parseInt(x);
        if (operasi === 'tambah') {
            x1 = x1 + 1;
        }
        if (operasi === 'kurang') {
            x1 = x1 - 1;
        }
        if (x1 <= 10 && x1 >= 0) {
            const y = x1 * <?php echo $product[0]['HargaProduct'] ?>;
            document.getElementById("TextHarga").innerHTML = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(y);
            document.getElementById("TotalBox").value = y;
        }

    }
</script>