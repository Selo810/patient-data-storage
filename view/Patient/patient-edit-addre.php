<?php
// Set session variables
$_SESSION["address_id"] =  $Address['address_id'];
?>

<div class="container">
<h3>Edit Patient Address</h3>
<div class="row">
    <form class="col s6 white" action="." method="post">
    <input type="hidden" name="action" value="edit-patient-address" />
    <input type="hidden" name="type" value="" />
   
       <fieldset>
    <p>Address</p>
    
    <div class="row">
        <div class="input-field col s12">
          <input id="street" type="text" name="street" class="validate" value="<?= $Address['street'] ?>">
          <label for="street">Street<span class="red-text">*</span></label>
        </div>
      </div>
      
       <div class="row">
        <div class="input-field col s12">
          <input id="city" type="text" name="city" class="validate" value="<?= $Address['city'] ?>">
          <label for="city">City<span class="red-text">*</span></label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <input id="state" type="text" name="state" class="validate" value="<?= $Address['state'] ?>">
          <label for="state">State<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="zip" type="text" name="zip" class="validate" value="<?= $Address['zip_code'] ?>">
          <label for="zip">Zip<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary blue-grey darken-4">Submit</button>
    </div>
      </fieldset>
       
    </form>
  </div>
 </div>     