<?php 
    $title='View Records';
    
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
    } else{
            echo"<h1 class='text-danger'>Please check details and try again</h1>";
        }
    
?>
<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
            <?php echo $result['firstname'] . ' ' . $result['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $result['name'];?>
            </h6>
            <p class="card-text"> Date of Birth: <?php echo $result['dateofbirth'];?> </p>
            <p class="card-text"> Email Address: <?php echo $result['emailaddress'];?> </p>
            <p class="card-text"> Contact Number: <?php echo $result['contactnumber'];?> </p>

</div>
<br/>
       <a href="viewrecords.php?" class="btn btn-info">back to list</a>
       <a href="edit.php?id=<?php echo $result['attendee_ID']; ?>" class="btn btn-warning">Edit</a>
       <a onclick ="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_ID'] ?>" class="btn btn-danger">Delete</a>


<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>