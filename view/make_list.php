<?php include '../view/admin_header.php';?>
<h2>Vehicle Make List</h2>

<?php if($makes) { ?>
        <table>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        <?php foreach ($makes as $make) : ?>
            
            <tr>
                <td><?=$make['makeName'] ?></td>
                <td>
                    <div class="list_remove_make">
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_make">
                            <input type="hidden" name="make_id" value="<?php echo $make['makeID']; ?>">
                            <button class="remove-button">Remove</button>
                        </form>
                </div>
            </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php } else { ?>
        <p>No makes exist yet.</p>
    <?php } ?>

    <h2>Add Vehicle make</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_make">
        <div class="add_inputs">
            <label >Name:</label>
            <input type="text" name="make_name" maxlength="16" placeholder="Name" autofocus required>
        </div>
        <div class="add_addItem">
            <button class="add-button bold">Add make</button>
        </div>
    </form>

<p><a href=".?action=list_vehicles">View Full Vehicle List</a></p>
<p><a href=".?action=vehicle_form">Click here</a> to add a vehicle.</p>
<p><a href=".?action=list_types">View/Edit Vehicle Types</a></p>
<p><a href=".?action=list_classes">View/Edit Vehicle Classes</a></p>
<?php include '../view/admin_footer.php';?>