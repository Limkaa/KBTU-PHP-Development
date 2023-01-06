<?php while($row = $result->fetch_assoc()) { ?>
<div class="feedback__item" data-id="<?php echo $row['id']?>">
    <div class="feedback__owner">
        <div class="feedback__owner__name"><?php echo $row['name']?></div>
        <div class="feedback__date"><?php echo $row['datetime']?></div>
    </div>
    <div class="feedback__comments">
        <div class="feedback__owner__message"><?php echo $row['text']?></div>

        <?php if ($row['fa_text']) { ?>
        <div class="feedback__company_answer">
            <div class="company_answer__title">Ответ:</div>
            <div class="company_answer__date"><?php echo $row['fa_datetime']?></div>
            <div class="company_answer__text"><?php echo $row['fa_text']?></div>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>