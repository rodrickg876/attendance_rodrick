<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    

    if(isset($_POST['submit'])){
        
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['DOB'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $issuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty);

        if($issuccess){
            echo include 'includes/successmessage.php';
            echo '<h1 class="text-center text-success">You have been registered!</h1>';
        }
        else{
            echo include 'includes/errormessage.php';
        }
        
    
    }

?>
    
<!-- this prints out values that were passed out value to the action page using method"get"-->
    <!--<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php //echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
            <?php //echo $_GET['specialty'];?>
            </h6>
            <p class="card-text"> Date of Birth: <?php //echo $_GET['DOB'];?> </p>
            <p class="card-text"> Email Address: <?php //echo $_GET['email'];?> </p>
            <p class="card-text"> Contact Number: <?php //echo $_GET['phone'];?> </p>
-->       
</div>

<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
            <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $_POST['specialty'];?>
            </h6>
            <p class="card-text"> Date of Birth: <?php echo $_POST['DOB'];?> </p>
            <p class="card-text"> Email Address: <?php echo $_POST['email'];?> </p>
            <p class="card-text"> Contact Number: <?php echo $_POST['phone'];?> </p>

</div>

<?php require_once 'includes/footer.php'; ?>