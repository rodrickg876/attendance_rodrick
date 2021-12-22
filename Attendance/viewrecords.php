<?php 
    $title='View Records';
    
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $results = $crud->getAttendees();
?>
</br>
    <table class = "tables">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialty</th>
            <th>Actions</th>
        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
          
           
           
            <tr>
                <td><?php echo $r['attendee_ID'] ?> </td>
                <td> <?php echo $r['firstname'] ?> </td>
                <td> <?php echo $r['lastname'] ?> </td>
                <td> <?php echo $r['specialty_id'] ?> </td>
                <td>
                    <a href="view.php?id=<?php echo $r['attendee_ID'] ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['attendee_ID'] ?>" class="btn btn-warning">Edit</a>
                    <a onclick ="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['attendee_ID'] ?>" class="btn btn-danger">Delete</a>
                    
                    
                </td>
            </tr>
            <?php }?>

</table>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>