<div class='max-w-[700px] mx-auto mb-4'>
    <form action="./index.php?controller=product&action=add" method="POST">
        <label>Product name</label>
        <input class='form-control' required name="name" />
        <label>Product quantity</label>
        <input class='form-control' type="number" required name="quantity" />
        <label class='mt-2'>Product description</label>
        <textarea class='form-control' name="description"></textarea>
        <button class='btn btn-primary mt-2'>Add a new product</button>
    </form>

    <div class='mt-4 gap-2 grid grid-cols-3'>
        <?php
        foreach ($products as $product) {
            echo '<div class="border p-2 rounded">
            <h4 class="overflow-hidden text-ellipsis whitespace-nowrap">' . $product['name'] . '</h4>
            <p class="overflow-hidden text-ellipsis whitespace-nowrap">' . $product['description'] . '</p>
            <p class="overflow-hidden text-ellipsis whitespace-nowrap">' . $product['quantity'] . '</p>
            <a href="./index.php?controller=product&action=show&productId=' . $product['id'] . '">
                <button class="btn btn-primary">View Details</button>
            </a>
            <a href="./index.php?controller=product&action=delete&productId=' . $product['id'] . '">
                <button class="btn btn-danger">Delete</button>
            </a>
            </div>';
        }
        ?>
    </div>

</div>