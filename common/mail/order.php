
    <div class="table-responsive">
        <table class="table table-hover table-stripped">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            <tbody>
            <?php foreach($_SESSION['cart'] as $id => $item):?>
                <tr>
                    <td><?=$item['name']?></td>
                    <td><?=$item['qty']?></td>
                    <td><?=$item['price']?></td>
                    <td><?=$item['price'] * $item['qty']?></td>
                </tr>
            <?php endforeach;?>
            <tr>
                <td colspan="3">Итого:</td>
                <td><?=$_SESSION['cart.qty']?></td>
            </tr>
            <tr>
                <td colspan="3">На сумму:</td>
                <td><?=$_SESSION['cart.sum']?></td>
            </tr>
            </tbody>
            </thead>
        </table>
    </div>
