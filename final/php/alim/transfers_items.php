<?php 
if ($transfers->num_rows > 0) { 
?>
    <ul class="list">
        <li class="list__item transfer">
            <span class="text text--secondary">Дата</span>
            <span class="text text--secondary">Со счета</span>
            <span class="text text--secondary">На счет</span>
            <span class="text text--secondary">Тип</span>
            <span class="text text--secondary">Сумма</span>
            <span class="text text--secondary">Коммиссия</span>
        </li>
        <?php while($transfer = $transfers->fetch_assoc()) {
            $from_type = $transfer['from_card_type_name'];
            $from_number = $transfer['from_card_number'];
            $to_type = $transfer['to_card_type_name'];
            $to_number = $transfer['to_card_number'];
            $unknown_number = $transfer['unknown_card'];
            if ($from_number || $to_number) {
                if ($unknown_number) {
                    if ($to_number) {
                        $from_number = $unknown_number;
                        $from_type = 'Карта другого банка';
                    }
                    else {
                        $to_number = $unknown_number;
                        $to_type = 'Карта другого банка';
                    };
                }
                if ($from_number) $from_number = "*** ".substr($from_number, -4);
                if ($to_number) $to_number =  "*** ".substr($to_number, -4);

                $tag_from = false;
                $tag_to = false;

                if ($transfer['from_user'] == $user_id && $transfer['to_user'] == $user_id) {
                    $amount_class="text--secondary";
                    $amount = $transfer["amount"];
                    $tag_to = true;
                    $tag_from = true;
                }
                else if ($transfer['from_user'] == $user_id) {
                    $amount_class="text--danger";
                    $amount = "- ".$transfer["amount"];
                    $tag_from = true;
                } else {
                    $amount_class="text--success";
                    $amount = "+ ".$transfer["amount"];
                    $tag_to = true;
                }
        ?>
        <li class="list__item transfer">
            <div class="text"><?php echo $transfer['created_at'];?></div>
            <div class="text">
                <div class="mb-2"><?php echo $from_type;?></div>
                <div class="text--secondary text--sm"><?php echo $from_number;?> 
                    <?php if ($tag_from) {?><span class="badge">Ваш Jusan счет</span><?php } ?>
                </div>
            </div>
            <div class="text">
                <div class="mb-2"><?php echo $to_type;?></div>
                <div class="text--secondary text--sm"><?php echo $to_number;?> 
                    <?php if ($tag_to) {?><span class="badge">Ваш Jusan счет</span><?php } ?>
                </div>
            </div>
            <div class="text"><?php echo $transfer['type_name'];?></div>
            <div class="text <?php echo $amount_class;?>"><?php echo $amount;?></div>
            <div class="text"><?php echo $transfer['fee'];?></div>
        </li>
        <?php } else { continue; } }?>
    </ul>
<?php } else { ?>
    <div class="text text-md">Вы не совершили ни одного платежа</div>
<?php } ?>