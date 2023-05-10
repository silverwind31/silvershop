<!-- Start of Sidebar, Shop Sidebar -->
<aside class="sidebar shop-sidebar left-sidebar sticky-sidebar-wrapper sidebar-fixed">
    <!-- Start of Sidebar Overlay -->
    <div class="sidebar-overlay"></div>
    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

    <!-- Start of Sidebar Content -->
    <div class="sidebar-content scrollable">
        <!-- Start of Sticky Sidebar -->
        <div class="sticky-sidebar">
            <div class="filter-actions">
                <label>Filter :</label>
                <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
            </div>
            <!-- Start of Collapsible widget -->
            <?php if(!empty($categories)): ?>
                <div class="widget widget-collapsible">
                <h3 class="widget-title"><label>All Categories</label></h3>
                <ul class="widget-body filter-items search-ul">
                    <?php foreach ($categories as $category): ?>
                        <li><a href="#"><?=$category->name?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- End of Collapsible Widget -->
            <?php endif; ?>

            <!-- Start of Collapsible Widget -->
            <div class="widget widget-collapsible">
                <h3 class="widget-title"><label>Price</label></h3>
                <div class="widget-body">
                    <ul class="filter-items search-ul">
                        <li><a href="?id=<?=$category->id?>&min_price=0&max_price=100">$0.00 - $100.00</a></li>
                        <li><a href="?id=<?=$category->id?>&min_price=100&max_price=200">$100.00 - $200.00</a></li>
                        <li><a href="?id=<?=$category->id?>&min_price=200&max_price=300">$200.00 - $300.00</a></li>
                        <li><a href="?id=<?=$category->id?>&min_price=300&max_price=500">$300.00 - $500.00</a></li>
                        <li><a href="?id=<?=$category->id?>&min_price=500">$500.00+</a></li>
                    </ul>
                    <form class="price-range">
                        <input type="hidden" name="id" value="<?=$category->id?>">
                        <input type="number" name="min_price" class="min_price text-center"
                               placeholder="$min">
                        <span class="delimiter">-</span>
                        <input type="number" name="max_price" class="max_price text-center"
                            placeholder="$max">
                        <button type="submit" href="#" class="btn btn-primary btn-rounded">Go</button>
                    </form>
                </div>
            </div>
            <!-- End of Collapsible Widget -->

            <!-- Start of Collapsible Widget -->

                <form class="brands_filter">
                    <input type="hidden" name="id" value="<?=$category->id?>">
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title"><label>Brands</label></h3>
                        <ul class="widget-body filter-items item-check mt-1">
                            <?php if (!empty($brands)): ?>
                                <?php foreach ($brands as $brand): ?>
                                    <li>
                                        <label>
                                            <input <?=(!empty($_GET['brands']) && in_array($brand->id,$_GET['brands'])) ? 'checked' : ''?> type="checkbox" name="brands[]" value="<?=$brand->id?>"><?=$brand->name?>
                                        </label>
                                    </li>

                                <?php endforeach; ?>
                            <?php endif; ?>

                        </ul>
                    </div>
                </form>
            <!-- End of Collapsible Widget -->
        </div>
        <!-- End of Sidebar Content -->
    </div>
    <!-- End of Sidebar Content -->
</aside>
<!-- End of Shop Sidebar -->
