<?php include 'view/header.php';?>

<section id="list" class="list">
    <header class="list_row list_header">
        <form action="." method="get" id="list_header_select" class="list_header_select">
            <input type="hidden" name="action" value="make">
            <select name="make_id" required>
                <option value="0">View All Makes</option>
                <?php foreach($makes as $make) : ?>
                    <?php if($make_id == $make['makeID']) { ?>
                        <option value="<?=$make['makeID'] ?>" selected>
                        <?php } else { ?>
                            <option value="<?=$make['makeID'] ?>">
                            <?php } ?>
                            <?=$make['makeName'] ?>
                        </option>
                        <?php endforeach; ?>
            </select>
            <button class="add-button bold">Submit</button>
            </form>
            <br>
            <form action="." method="get" id="list_header_select" class="list_header_select">
            <input type="hidden" name="action" value="type">
            <select name="type_id" required>
                <option value="0">View All Types</option>
                <?php foreach($types as $type) : ?>
                    <?php if($type_id == $type['typeID']) { ?>
                        <option value="<?=$type['typeID'] ?>" selected>
                        <?php } else { ?>
                            <option value="<?=$type['typeID'] ?>">
                            <?php } ?>
                            <?=$type['typeName'] ?>
                        </option>
                        <?php endforeach; ?>
            </select>
            <button class="add-button bold">Submit</button>
            </form>
            <br>
            <form action="." method="get" id="list_header_select" class="list_header_select">
            <input type="hidden" name="action" value="class">
            <select name="class_id" required>
                <option value="0">View All Classes</option>
                <?php foreach($classes as $class) : ?>
                    <?php if($class_id == $class['classID']) { ?>
                        <option value="<?=$class['classID'] ?>" selected>
                        <?php } else { ?>
                            <option value="<?=$class['classID'] ?>">
                            <?php } ?>
                            <?=$class['className'] ?>
                        </option>
                        <?php endforeach; ?>
            </select>
            <button class="add-button bold">Submit</button>
            </form>
            <br>
            <form action="." method="get" id="list_header_select" class="list_header_select">
                <p>Sort by:</p>
                <input type="radio" name="action" value="year">
                <label for="year">Year</label>
                <input type="radio" name="action" value="price">
                <label for="price">Price</label>
                <button class="add-button bold">Submit</button>
            </form>
            
    </header>
    <?php if($vehicles) { ?>
        <table>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
            </tr>
        <?php foreach ($vehicles as $vehicle) : ?>
            
            <tr>
                <td><?=$vehicle['year'] ?></td>
                <td><?=$vehicle['makeName'] ?></td>
                <td><?=$vehicle['model'] ?></td>
                <td><?=$vehicle['typeName'] ?></td>
                <td><?=$vehicle['className'] ?></td>
                <td>$<?=$vehicle['price'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php } else { ?>
        <p>No vehicles exist yet.</p>
    <?php } ?>
</section>


<?php include 'view/footer.php';?>