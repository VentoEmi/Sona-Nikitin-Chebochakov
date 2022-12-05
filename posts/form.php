<?php
$db = require $_SERVER['DOCUMENT_ROOT'] . '/common/db.php';
$items = $db->query("SELECT id, name, price, size, capacity, bed, services, image FROM room ")
?>
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                <?php foreach ($items as $item):?>
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="<?=$item['image']?>">
                        <div class="hr-text">
                            <h3><?=$item['name']?></h3>
                            <h2><?=$item['price']?>₽<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td><?=$item['size']?> ft</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion <?=$item['capacity']?></td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td><?=$item['bed']?></td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td><?=$item['services']?></td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="room-details.php?id=<?=$item['id']?>" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>