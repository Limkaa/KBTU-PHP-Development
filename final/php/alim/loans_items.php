<?php if ($loans->num_rows > 0) { ?>
    <ul class="list">
        <li class="list__item loan">
            <span class="text text--sm text--secondary">Оформлено</span>
            <span class="text text--sm text--secondary">Сумма</span>
            <span class="text text--sm text--secondary">Выплачено</span>
            <span class="text text--sm text--secondary">Осталось</span>
        </li>
        <?php 
        while($loan = $loans->fetch_assoc()) {
            $left_amount = $loan['amount'] - $loan['paid_amount'];
        ?>
        <li class="list__item loan">
            <span class="text text--sm "><?php echo substr($loan['created_at'], 0, 10);?></span>
            <span class="text text--sm "><?php echo $loan['amount'];?></span>
            <span class="text text--sm "><?php echo $loan['paid_amount'];?></span>
            <span class="text text--sm "><?php echo $left_amount ;?></span>
        </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <div class="text text-md">У вас отсутствуют кредиты</div>
<?php } ?>
