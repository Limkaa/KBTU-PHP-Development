<div class="card">
    <div class="flex justify-between align-center mb-2">
        <div class="text text--bold"><?php echo $card['type_name']?></div>
    </div>
    <div class="text text--sm text--secondary mb-3"><span class="cardNumber"><?php echo $card['number']?></span> <span>(<?php echo $card['issuer_name']?>)</span></div>
    <div class="text">Баланс: <span class="text--bold"><?php echo $card['balance']?> KZT</span></div>
</div>