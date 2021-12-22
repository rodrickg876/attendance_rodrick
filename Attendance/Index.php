<?php 
    $title='Index';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getspecialty();

    
?>
    <h1 class="text-center">Registration for IT Conference</h1>

<form method="post" action="success.php">
<div class="form-group">
         <label for="firstname">first name </label>
        <input required type="text" class="form-control" id="firstname" name="firstname">         
  </div>
  <div class="form-group">
         <label for="lastname">last name </label>
        <input required type="text" class="form-control" id="lastname" name="lastname">         
  </div>
  <div class="form-group">
         <label for="DOB">Date of Birth</label>
        <input type="text" class="form-control" id="DOB" name="DOB">         
  </div>
  <div class="form-group">
         <label for="specialty">Area of Expertise</label>
         <select class="form-control" id="specialty" name="specialty">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                <option value = "<?php echo $r ['specialty_id'] ?>"><?php echo $r['name']; ?></option>
            <?php }?>
          </select>     
  </div>
    <div class="form-group">
         <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp">
         <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
         <label for="phone">contact number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
         <small id="phoneHelp" class="form-text text-muted">We'll never share your contact number with anyone else.</small>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

    <?php require_once 'includes/footer.php'; ?>