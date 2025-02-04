<div class="container mt-4">
    <h2>Create Inventory Log</h2>

    <form action="/inventory_logs/store" method="POST">
        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control">
                <?php foreach ($products as $product): ?>
                    <option value="<?= esc($product['id']); ?>"><?= esc($product['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="action">Action</label>
            <select name="action" id="action" class="form-control">
                <option value="Stock In">Stock In</option>
                <option value="Sale">Sale</option>
                <option value="Stock Adjustment">Stock Adjustment</option>
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Save Log
        </button>
        <a href="<?= site_url('inventory_logs'); ?>" class="btn btn-secondary ml-2">
            <i class="fas fa-arrow-left"></i> Cancel
        </a>
    </form>
</div>
