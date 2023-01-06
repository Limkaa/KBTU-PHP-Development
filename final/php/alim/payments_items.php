<?php if ($payments->num_rows > 0) { ?>
    <ul class="list">
        <li class="list__item payment">
            <span class="text text--secondary">Дата</span>
            <span class="text text--secondary">Категория</span>
            <span class="text text--secondary">Сумма</span>
            <span class="text text--secondary">Бонусы</span>
        </li>
        <?php while($payment = $payments->fetch_assoc()) {?>
        <li class="list__item payment">
            <span class="text"><?php echo $payment['created_at'];?></span>
            <span class="text"><?php echo $payment['category_name'];?></span>
            <span class="text"><?php echo $payment['amount'];?></span>
            <span class="text text--success">+ <?php echo $payment['bonus'];?></span>
        </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <div class="text text-md">Вы не совершили ни одного платежа</div>
<?php } ?>