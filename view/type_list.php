<?php include '../view/admin_header.php';?>
<h2>Vehicle Type List</h2>

<?php if($types) { ?>
        <table>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        <?php foreach ($types as $type) : ?>
            
            <tr>
                <td><?=$type['typeName'] ?></td>
                <td>
                    <div class="list_remove_type">
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_type">
                            <input type="hidden" name="type_id" value="<?php echo $type['typeID']; ?>">
                            <button class="remove-button">Remove</button>
                        </form>
                </div>
            </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php } else { ?>
        <p>No types exist yet.</p>
    <?php } ?>

    <h2>Add Vehicle type</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_type">
        <div class="add_inputs">
            <label >Name:</label>
            <input type="text" name="type_name" maxlength="16" placeholder="Name" autofocus required>
        </div>
        <div class="add_addItem">
            <button class="add-button bold">Add type</button>
        </div>
    </form>

<p><a href=".?action=list_vehicles">View Full Vehicle List</a></p>
<p><a href=".?action=vehicle_form">Click here</a> to add a vehicle.</p>
<p><a href=".?action=list_makes">View/Edit Vehicle Makes</a></p>
<p><a href=".?action=list_classes">View/Edit Vehicle Classes</a></p>
<?php include '../view/admin_footer.php';?>