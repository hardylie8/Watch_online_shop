<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Cart List</h2>
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
                                <th scope="col">Remove</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col-2">Pay Now</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form id="form1" method="POST" action="<?= site_url('/cart/update'); ?>">
                                <?php
                                $i = 1;
                                $product = array_unique($product, SORT_REGULAR);
                                foreach ($product as $product) {
                                ?>
                                    <tr>
                                        <td>
                                            <a class="bg- p-3 rounded" href="cart/delete/<?php echo $product['IdCart']; ?>"><i class="fas fa-trash-alt text-danger"></i></a>
                                        </td>

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
                                            <h5 id="Harga<?php echo $product['IdCart']; ?>">
                                                <?php echo "Rp. " . number_format($product['HargaProduct'], 0); ?>
                                            </h5>
                                        </td>
                                        <td>
                                            <input hidden type="text" name="IdCart<?php echo $i; ?>" value="<?php echo $product['IdCart']; ?>">
                                            <input hidden type="text" id="TotalBox<?php echo $product['IdCart']; ?>" name="Total<?php echo $i; ?>" value="<?php echo $product['Total']; ?>">
                                            <div class="product_count">
                                                <span class="input-number-decrement" onclick="TampilHarga('kurang', <?php echo $product['IdCart']; ?>)"> <i class="ti-minus"></i></span>
                                                <input class="input-number78" type="text" id="QtyU<?php echo $product['IdCart']; ?>" name="QtyU<?php echo $i; ?>" value=" <?php echo $product['Qty']; ?>" min="0" max="10">
                                                <span class="input-number-increment" onclick="TampilHarga('tambah',<?php echo $product['IdCart']; ?>)"> <i class="ti-plus"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 id="Total<?php echo $product['IdCart']; ?>">
                                                <?php echo "Rp. " . number_format($product['Total'], 2); ?>
                                            </h5>
                                        </td>
                                        <td>
                                            <a href="cart/pay/<?php echo $product['IdCart']; ?>" class="btn rounded bg-primary">Pay Now</a>
                                        </td>
                                    </tr>

                                <?php
                                    $i++;
                                } ?>
                                <tr class="bottom_button">
                                    <td>

                                    </td>
                                    <td></td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="cupon_text float-right">
                                            <a href="javascript:;" onclick="document.getElementById('form1').submit()" class="btn_1" href="#">Update Cart</a>
                                        </div>
                                    </td>
                                </tr>

                            </form>

                        </tbody>
                    </table>

                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->
</main>
<script>
    function TampilHarga(op, x) {
        let nama = "QtyU" + x;
        let angka;
        let z = document.getElementById(nama).value;
        if (op == "kurang") {
            angka = parseInt(z) - 1;
        } else {
            angka = parseInt(z) + 1;
        }
        if (angka <= 10 && angka >= 0) {
            document.getElementById(nama).value = angka;
            let harga = "Harga" + x;
            let y = document.getElementById(harga).innerHTML;
            let HargaText = parseFloat(y.replace(/\D/g, ''));
            harga = "Total" + x;
            TotalBox = "TotalBox" + x;
            total = HargaText * angka;
            document.getElementById(TotalBox).value = total;
            document.getElementById(harga).innerHTML = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(total);
        }
    }
</script>
<script src="http://api.iksgroup.co.id/apijs/lokasiapi.js"></script>
<script>
    var render = createwidgetlokasi("provinsi", "kabupaten", "kecamatan", "kelurahan");
</script>