<?php include '../view/admin_header.php';?>
<h2>Vehicle Class List</h2>

<?php if($classes) { ?>
        <table>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        <?php foreach ($classes as $class) : ?>
            
            <tr>
                <td><?=$class['className'] ?></td>
                <td>
                    <div class="list_remove_class">
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_class">
                            <input type="hidden" name="class_id" value="<?php echo $class['classID']; ?>">
                            <button class="remove-button">Remove</button>
                        </form>
                </div>
            </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php } else { ?>
        <p>No classes exist yet.</p>
    <?php } ?>

    <h2>Add Vehicle class</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_class">
        <div class="add_inputs">
            <label >Name:</label>
            <input type="text" name="class_name" maxlength="16" placeholder="Name" autofocus required>
        </div>
        <div class="add_addItem">
            <button class="add-button bold">Add class</button>
        </div>
    </form>

<p><a href=".?action=list_vehicles">View Full Vehicle List</a></p>
<p><a href=".?action=vehicle_form">Click here</a> to add a vehicle.</p>
<p><a href=".?action=list_makes">View/Edit Vehicle Makes</a></p>
<p><a href=".?action=list_types">View/Edit Vehicle Types</a></p>
<?php include '../view/admin_footer.php';?>