<?php
// Set session variables
$_SESSION["doctor_id"] =  $Doctor['doctor_id'];
?>
<h3>Edit Doctor</h3>
<div class="row">
    <form class="col s6 white" action="." method="post">
    <input type="hidden" name="action" value="edit-doctor" />
    <input type="hidden" name="type" value="" />
   
    <fieldset>
    <p>Personal Information</p>
      <div class="row">
        <div class="input-field col s12">
          <input id="first_name" type="text" name="first_name" class="validate" value="<?= $Doctor['first_name'] ?>">
          <label for="first_name">First Name<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="middle_name" type="text" name="middle_name" class="validate" value="<?= $Doctor['middle_name'] ?>">
          <label for="middle_name">Middle Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="last_name" type="text" name="last_name" class="validate" value="<?= $Doctor['last_name'] ?>">
          <label for="last_name">Last Name<span class="red-text">*</span></label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" name="email" class="validate" value="<?= $Doctor['email'] ?>">
          <label for="middle_name">Email<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="phone" type="text" name="phone" class="validate" value="<?= $Doctor['phone'] ?>">
          <label for="phone">Phone<span class="red-text">*</span></label>
        </div>
      </div>
        
    <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary blue-grey darken-4">Submit</button>
    </div>
      </fieldset>
       
    </form>
  </div>
 