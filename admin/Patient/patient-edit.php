<?php
// Set session variables
$_SESSION["patient_id"] =  $Patient['patient_id'];
$_SESSION["address_id"] =  $Address['address_id'];
?>

<div class="container">
<h3>Edit Patient Information</h3>
<div class="row">
    <form class="col s6 white" action="." method="post">
    <input type="hidden" name="action" value="edit-patient" />
    <input type="hidden" name="type" value="" />
   
       <fieldset>
    <p>Personal Information</p>
      <div class="row">
        <div class="input-field col s12">
          <input id="first_name" type="text" name="first_name" class="validate" value="<?= $Patient['first_name'] ?>">
          <label for="first_name">First Name<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="middle_name" type="text" name="middle_name" class="validate" value="<?= $Patient['middle_name'] ?>">
          <label for="middle_name">Middle Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="last_name" type="text" name="last_name" class="validate" value="<?= $Patient['last_name'] ?>">
          <label for="last_name">Last Name<span class="red-text">*</span></label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" name="email" class="validate" value="<?= $Patient['email'] ?>">
          <label for="middle_name">Email<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="phone" type="text" name="phone" class="validate" value="<?= $Patient['phone'] ?>">
          <label for="phone">Phone<span class="red-text">*</span></label>
        </div>
      </div>
      <label>Gender<span class="red-text">*</span></label>
      <p>
      <input value="male" name="gender" type="radio" id="male" />
      <label for="male">Male</label>
      </p>
      <p>
      <input value="female" name="gender" type="radio" id="female" />
      <label for="female">Female</label>
      </p>
      <p>
      <input value="other" name="gender" type="radio" id="other" />
      <label for="other">Other</label>
      </p>
      <label>Date of Birth<span class="red-text">*</span></label>
      <div class="row">
        <div class="input-field col s12">
          <input id="date_of_birth" type="date" name="date_of_birth" class="validate" value="<?= $Patient['date_of_birth'] ?>">
        </div>
      </div>
      
       <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary blue-grey darken-4">Submit</button>
    </div>
      </fieldset>
    </form>
  </div>
 </div>     