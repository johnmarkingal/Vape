<h2>Edit Inventory Log</h2>

<form action="/inventory_logs/update/<?= esc($inventoryLog['id']); ?>" method="POST">
    <label for="product_id">Product:</label>
    <select name="product_id" id="product_id">
        <?php foreach ($products as $product): ?>
            <option value="<?= esc($product['id']); ?>" <?= ($product['id'] == $inventoryLog['product_id']) ? 'selected' : ''; ?>>
                <?= esc($product['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label for="action">Action:</label>
    <select name="action" id="action">
        <option value="Stock In" <?= ($inventoryLog['action'] == 'Stock In') ? 'selected' : ''; ?>>Stock In</option>
        <option value="Sale" <?= ($inventoryLog['action'] == 'Sale') ? 'selected' : ''; ?>>Sale</option>
        <option value="Stock Adjustment" <?= ($inventoryLog['action'] == 'Stock Adjustment') ? 'selected' : ''; ?>>Stock Adjustment</option>
    </select>
    <br><br>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" value="<?= esc($inventoryLog['quantity']); ?>" required>
    <br><br>

    <button type="submit">Update Log</button>
</form>
