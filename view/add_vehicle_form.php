<?php include '../view/admin_header.php';?>

<section>
        <h2>Add Vehicle</h2>
        
        <form action="." method="post">
            <input type="hidden" name="action" value="add_vehicle" id="add_form" class="add_form">
            <label>Make:</label>
            <select name="make_id" required>
                <?php foreach($makes as $make) : ?>
                    <?php if($make_id == $make['makeID']) { ?>
                        <option value="<?=$make['makeID'] ?>">
                        <?php } else { ?>
                            <option value="<?=$make['makeID'] ?>">
                            <?php } ?>
                            <?=$make['makeName'] ?>
                        </option>
                        <?php endforeach; ?>
            </select>
            <br>
            
            <label>Type:</label>
            <select name="type_id" required>
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
            <br>
            <label>Class:</label>
            <select name="class_id" required>
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
            <br>
            <label>Year:</label>
            <input type="text" name="year" required />
            <br>
            <label>Model:</label>
            <input type="text" id="model" name="model" required />
            <br>
            <label>Price:</label>
            <input type="text" id="price" name="price" required />
            <br>
            <button class="add-button bold">Add Vehicle</button>
           
</form>
</section>

<p><a href=".?action=list_vehicles">View Full Vehicle List</a></p>
<p><a href=".?action=list_makes">View/Edit Vehicle Makes</a></p>
<p><a href=".?action=list_types">View/Edit Vehicle Types</a></p>
<p><a href=".?action=list_classes">View/Edit Vehicle Classes</a></p>
<?php include '../view/admin_footer.php';?>