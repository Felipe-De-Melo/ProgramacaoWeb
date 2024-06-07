<!-- 
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
-->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <h2><?php echo $product->name; ?></h2>
                <p><?php echo $product->description; ?></p>
                <p><?php echo $product->price; ?></p>
                <form action="/order.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                    <input type="number" name="quantity" value="1">
                    <input type="hidden" name="total" value="<?php echo $product->price; ?>">
                    <button type="submit">Buy</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
