<?php
include 'db.php';
include 'product.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Listing</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <!-- Filters Sidebar -->
        <div class="sidebar">
            <form action="index.php" method="GET">
                <div class="filter-group">
                    <h3>PRICE</h3>
                    <label for="min_price">Min Price:</label>
                    <input type="number" name="min_price" id="min_price" placeholder="Min Price" value="<?php echo htmlspecialchars($min_price ?? ''); ?>">
                    <label for="max_price">Max Price:</label>
                    <input type="number" name="max_price" id="max_price" placeholder="Max Price" value="<?php echo htmlspecialchars($max_price ?? ''); ?>">
                </div>
                <div class="filter-group">
                    <h3>CATEGORY</h3>
                    <select name="category" id="category">
                        <option value="">Select Category</option>
                        <option value="electronics" <?php if ($category ?? '' == 'electronics') echo 'selected'; ?>>Electronics</option>
                        <option value="books" <?php if ($category ?? '' == 'books') echo 'selected'; ?>>Books</option>
                    </select>
                </div>
                <div class="filter-group">
                    <h3>SALE STATUS</h3>
                    <select name="sale_status" id="sale_status">
                        <option value="">All</option>
                        <option value="on_sale" <?php if ($sale_status ?? '' == 'on_sale') echo 'selected'; ?>>On Sale</option>
                        <option value="not_on_sale" <?php if ($sale_status ?? '' == 'not_on_sale') echo 'selected'; ?>>Not On Sale</option>
                    </select>
                </div>
                <button type="submit">Filter</button>
            </form>
        </div>

        <!-- Product List -->
        <div class="main-content">
            <div class="sort">
                <label for="sort">Sort By:</label>
                <select id="sort" name="sort">
                    <option value="position">Position</option>
                </select>
                <label for="show">Show:</label>
                <select id="show" name="show">
                    <option value="12">12</option>
                </select>
            </div>

            <div class="product-grid">
                <?php
                if (isset($products) && is_array($products)) : ?>
                    <?php foreach ($products as $product) : ?>
                        <div class="product">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <h4><?php echo htmlspecialchars($product['name']); ?></h4>
                            <p>$<?php echo htmlspecialchars($product['price']); ?></p>
                            <?php if ($product['stock'] == 'Yes') { ?>
                                <p class="sale-status">In Stock</p>
                            <?php } else { ?>
                                <p class="sale-status out-of-stock">Out of Stock</p>
                            <?php } ?>
                            <button>Add to Cart</button>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No products found.</p>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php if (isset($totalPages)) : ?>
                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <a href="index.php?page=<?php echo $i; ?>&min_price=<?php echo htmlspecialchars($min_price ?? ''); ?>&max_price=<?php echo htmlspecialchars($max_price ?? ''); ?>&category=<?php echo htmlspecialchars($category ?? ''); ?>&sale_status=<?php echo htmlspecialchars($sale_status ?? ''); ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>