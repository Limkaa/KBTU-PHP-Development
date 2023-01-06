<?php 
    session_start();
    
    require_once('php/alim/utils.php');
    require_once('php/db.php');
    require_once('php/alim/auth_required.php');
    
    $user_id = $_SESSION['user_id'];
    
    $history_active_tab = 'payments';
    $history_tabs = array('transfers', 'payments');
    if (isset($_GET['tab']) && in_array($_GET['tab'], $history_tabs)) {
        $history_active_tab = $_GET['tab'];
    }
    
    $account_query = "SELECT * FROM users LEFT JOIN cards ON users.id=cards.user_id WHERE users.id=$user_id";
    $account = mysqli_query($conn,  $account_query) -> fetch_assoc();
    
    $loans_query = "SELECT * FROM loans WHERE user_id=$user_id";
    $loans = mysqli_query($conn,  $loans_query);

    $cards_query = "SELECT cards.*, card_types.name AS type_name, card_issuers.name AS issuer_name FROM cards 
    LEFT JOIN card_issuers ON cards.issuer=card_issuers.id
    LEFT JOIN card_types ON cards.type=card_types.id
    WHERE user_id=$user_id AND type != 1
    ";
    $cards = mysqli_query($conn,  $cards_query);

    $payments_query = "SELECT payments.*, payment_categories.name AS category_name, cards.number AS card_number FROM payments 
    LEFT JOIN cards ON payments.card_id = cards.id
    LEFT JOIN payment_categories ON payments.category_id = payment_categories.id
    WHERE user_id = $user_id
    ORDER BY created_at DESC;
    ";
    $payments = mysqli_query($conn,  $payments_query);

    $transfers_query = "SELECT 
    operations.*, 
    from_card.number AS from_card_number, from_card.user_id AS from_user,
    to_card.number AS to_card_number, to_card.user_id AS to_user,
    from_card_types.name AS from_card_type_name,
    to_card_types.name AS to_card_type_name,
    operation_types.name AS type_name
    FROM operations
    LEFT JOIN cards AS from_card ON operations.from_card = from_card.id
    LEFT JOIN cards AS to_card ON operations.to_card = to_card.id
    LEFT JOIN card_types AS from_card_types ON from_card.type = from_card_types.id
    LEFT JOIN card_types AS to_card_types ON to_card.type = to_card_types.id
    LEFT JOIN operation_types ON operations.type = operation_types.id
    WHERE from_card.user_id=$user_id OR to_card.user_id=$user_id
    ORDER BY created_at DESC;
    ";
    $transfers = mysqli_query($conn,  $transfers_query);

    function checkTab($value) {
        global $history_active_tab;
        return $history_active_tab==$value ? 'active': '';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/aizar/header.css">
    <link rel="stylesheet" href="styles/aizar/styles.css">
    <link rel="stylesheet" href="styles/alim/common.css">
    <link rel="stylesheet" href="styles/alim/bank.css">
    <title>Мой банк</title>
</head>

<body>
    <?php include("php/aizar/jusan_header.php") ?>
    <div class="wrapper">
        <div class="wrapper__inner">
            <section class="wrapper__section">
                <h2 class="text text--md text--bold mb-5">Основная информация</h2>
                <div class="general">
                    <div class="card">
                        <div class="card__section">
                            <div class="text text--bold mb-3">Ваш основной счет в Jusan</div>
                            <div class="text text--secondary"><span class="cardNumber"><?php echo $account['number'];?></span></div>
                        </div>
                        <div class="card__section">
                            <div class="text mb-2">Текущий баланс: <span class="text--bold"><?php echo $account['balance'];?> KZT</span></div>
                            <div class="text">Ваши бонусы: <span class="text--bold"><?php echo $account['bonuses'];?> KZT</span></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="text text--bold mb-2">Перевод между счетами</div>
                        <form action="php/alim/create_transfer.php" class="form transfer-money" id="transfer-form" method="post">
                            <div class="form-control">
                                <div class="text text--sm text--secondary mb-1">С какого счета</div>
                                <select name="from_account" id="from-account-select" class="select">
                                    <?php
                                        $account_id = $account['id'];
                                        echo "<option value='$account_id' selected>Основной счет</option>";

                                        while($card = $cards->fetch_assoc()) {
                                            $card_id = $card['id'];
                                            $card_number = "*** ".substr($card['number'], -4);
                                            echo "<option value='$card_id'>Карта Jusan - $card_number</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-control">
                                <div class="text text--sm text--secondary mb-1">На номер счета или карты</div>
                                <input type="text" min="0" name="to_card_number" class="input mb-1" maxlength="19" placeholder="1234 1234 1234 1234" id="cardNumber">
                                <div class="text text--sm text--secondary" id="card-issued"></div>
                                <input type="number" min="0" name="to_card_id" class="hidden" id="to_card_id">
                            </div>
                            <div class="form-control">
                                <div class="number text--sm text--secondary mb-1">Сумма</div>
                                <input type="text" min="0" name="amount" class="input" placeholder="100 000" id="transferAmount">
                            </div>
                            <div class="form-control flex align-center">
                                <div class="text text--sm text--danger hidden" id="transfer-error">Ошибка</div>
                            </div>
                            <div class="form-control flex align-center">
                                <input type="number" min="0" name="fee" class="hidden" value="0" id="fee">
                                <button class="btn btn--sm mr-3 w-full" id="transfer-button" disabled>Перевести</button>
                            </div>
                            <div class="form-control flex justify-center flex-col">
                                <div class="text text--sm mb-1">Комиссия: <span id="fee-amount">0</span> тг.</div>
                                <div class="text text--sm">Итого: <span id="total-amount">0</span> тг.</div>
                            </div>
                        </form>
                    </div>
                    <div class="card loans">
                        <div class="text text--bold mb-2">Кредиты</div>
                        <div class="card__section loans__list">
                            <?php include('php/alim/loans_items.php'); ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="wrapper__section">
                <h2 class="text text--md text--bold mb-5">Ваши карты Jusan банка</h2>
                <div class="banking__accounts">
                    <?php 
                        $cards->data_seek(0);
                        while($card = $cards->fetch_assoc()) {
                            include('php/alim/bank_card.php');
                        }
                    ?>

                    <div class="card card--template">
                        <div class="text text--bold mb-2">Открыть новую карту Jusan</div>
                        <div class="text mb-2">Популярных мировых эмитентов</div>
                        <a href="php/alim/create_card.php" style="text-decoration: none"><button class="btn btn--dark btn--sm">Создать</button></a>
                    </div>
                </div>
            </section>

            <section class="wrapper__section">
                <h2 class="text text--md text--bold mb-5">История банковских операций</h2>
                <div class="card" style="min-height: 300px">
                    <div class="tabs">
                        <div class="tabs__nav mb-3">
                            <div class="tabs__item <?php echo $history_active_tab=='payments' ? 'active' : '';?>">Платежи</div>
                            <div class="tabs__item <?php echo $history_active_tab=='transfers' ? 'active' : '';?>">Переводы</div>
                        </div>

                        <div class="tabs__content <?php echo $history_active_tab=='payments' ? 'active' : '';?>">
                            <?php include('php/alim/payments_items.php'); ?>
                        </div>
                        <div class="tabs__content <?php echo $history_active_tab=='transfers' ? 'active' : '';?>">
                            <?php include('php/alim/transfers_items.php'); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <footer></footer>

    <script src="js/jquery.js"></script>
    <script src="js/alim/bank.js"></script>
    <script src="js/alim/payment.js"></script>
</body>

</html>