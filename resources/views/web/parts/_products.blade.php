<div class="ds_wrapper wrapper_middle" id="price">
    <div class="container">
        <div class="row">
            <!-- left_side -->
            <div class="col-sm-6 col-lg-6 left_beard_gallery">
                <h2 class="block_title">
                    Galería
                </h2>
                <ul class="gallery clearfix">
                    <!-- SnapWidget -->
                    <iframe src="https://snapwidget.com/embed/1043321" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:465px; height:310px"></iframe>
            </div>
            <!-- left_side end-->
            <!-- right_side start-->
            <div class="col-sm-6 col-lg-6">
                <div class="prices_section">
                    <h2 class="block_title">
                        Lista de Precios
                    </h2>
                    <ul class="price_ul">
                        @foreach ($prices as $price)
                        <li class="price_list">
                            <div class="price_title">
                                {{ $price->name }}
                            </div>
                            <div class="price_right">
                                ${{ $price->price }}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- right_side end-->
        </div>
    </div>
</div>
