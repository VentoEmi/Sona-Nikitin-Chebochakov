<?php
$db = require $_SERVER['DOCUMENT_ROOT'] . '/common/db.php';
$items = $db->query("SELECT id, name, price, size, capacity, bed, services, image FROM room ")
?>
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            <?php foreach ($items as $item):?>
            <div class="col-lg-4 col-md-6">

                <div class="room-item" >
                    <img class="img_room" src="<?=$item['image']?>" alt="">
                    <div class="ri-text">
                        <h4><?=$item['name']?></h4>
                        <h3><?=$item['price']?>₽<span>/Pernight</span></h3>
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
</section>
