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
                            <h2>New Product</h2>
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
                    <?php echo form_open_multipart("/addproduct/add"); ?>
                    <!-- <form method="post" action="<?= site_url('/addproduct/add'); ?>"> -->
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h4 class="text-color">Nama Product</h4>
                                </td>
                                <td>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="file" name="input_gambar">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-color">Nama Product</h4>
                                </td>
                                <td>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input class="form-control valid" name="namaBarang" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter product name'" placeholder="Enter product name">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-color">Product Price</h4>
                                </td>
                                <td>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input class="form-control valid" name="HargaBarang" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter product price'" placeholder="Enter product price">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-color">Product description</h4>
                                </td>
                                <td>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="Desc" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter description'" placeholder=" Enter description"></textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div style="margin-left:45px" class="float-center  add_to_cart">
                                        <input style="cursor:pointer" type="submit" class="btn_3" value="add to cart">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- </form> -->
                    <?php echo form_close(); ?>
                </div>
            </div>
    </section>
</main>