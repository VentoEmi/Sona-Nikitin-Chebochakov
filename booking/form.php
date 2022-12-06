<?php
$db = require $_SERVER['DOCUMENT_ROOT'] . '/common/db.php';
$items = $db->query("SELECT * FROM room ");
?>
<form action="booking/mail.php" method="post">
    <div class="check-date">
        <label for="date-in">Check In:</label>
        <input type="date" name="checkIn"  id="date-in" required>

    </div>
    <div class="check-date">
        <label for="date-out">Check Out:</label>
        <input type="date" name="checkOut"  id="date-out" required>

    </div>
    <div class="select-option">
        <label for="guest">Guests:</label>
        <input type="text" name="guests"  id="input-submit" required>
    </div>
    <div class="select-option">
        <label for="room">Room:</label>
        <select name="room" id="room" required>
            <?php foreach ($items as $item):?>
                <option value="<?=$item['id']?>">
                    <?=$item['name']?>
                </option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="select-option">
        <label for="email">Email:</label>
        <input type="email" name="email"  required>
    </div>
    <button type="submit">Check Availability</button>
</form>