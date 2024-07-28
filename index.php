<?php
include 'db.php';

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
        <div class="filters">
            <form action="index.php" method="GET">
                <div class="filter-group">
                    <label for="min_price">Min Price:</label>
                    <input type="number" name="min_price" id="min_price" placeholder="Min Price" value="<?php echo htmlspecialchars($min_price ?? ''); ?>">
                </div>
                <div class="filter-group">
                    <label for="max_price">Max Price:</label>
                    <input type="number" name="max_price" id="max_price" placeholder="Max Price" value="<?php echo htmlspecialchars($max_price ?? ''); ?>">
                </div>
                <div class="filter-group">
                    <label for="category">Category:</label>
                    <select name="category" id="category">
                        <option value="">Select Category</option>
                        <option value="electronics" <?php if ($category ?? '' == 'electronics') echo 'selected'; ?>>Electronics</option>
                        <option value="books" <?php if ($category ?? '' == 'books') echo 'selected'; ?>>Books</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="sale_status">Sale Status:</label>
                    <select name="sale_status" id="sale_status">
                        <option value="">All</option>
                        <option value="on_sale" <?php if ($sale_status ?? '' == 'on_sale') echo 'selected'; ?>>On Sale</option>
                        <option value="not_on_sale" <?php if ($sale_status ?? '' == 'not_on_sale') echo 'selected'; ?>>Not On Sale</option>
                    </select>
                </div>
                <button type="submit">Filter</button>
            </form>
        </div>

        <div class="product-list">
            <?php if (isset($products) && is_array($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="product">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p class="price"><?php echo htmlspecialchars($product['price']); ?></p>
                        <p class="sale-status"><?php echo htmlspecialchars($product['sale_status']); ?></p>
                        <button>Add to Cart</button>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>

        <div class="pagination">
            <?php if (isset($totalPages)) : ?>
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="index.php?page=<?php echo $i; ?>&min_price=<?php echo htmlspecialchars($min_price ?? ''); ?>&max_price=<?php echo htmlspecialchars($max_price ?? ''); ?>&category=<?php echo htmlspecialchars($category ?? ''); ?>&sale_status=<?php echo htmlspecialchars($sale_status ?? ''); ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>