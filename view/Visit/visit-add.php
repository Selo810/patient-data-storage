<?php
// Set session variables
$_SESSION["patient_id"] = $Patient['patient_id'];

?>
<h3>Schedule a Visit</h3>
<div class="row">
    <form class="col s6" action="." method="post">
    <input type="hidden" name="action" value="add-visit" />
    
   
    <fieldset>
    <p>New Visit for <?= $Patient['first_name'] ?> <?= $Patient['middle_name'] ?> <?= $Patient['last_name'] ?></p>
    
    <label>Doctors</label>

    <select class="browser-default" name="doctor_id">
      <option value="" disabled selected>Select Doctor</option>
      <?php foreach($Doctor as $d) : ?>
      <option value="<?= $d['doctor_id'] ?>"><?= $d['first_name'] ?> <?= $d['middle_name'] ?> <?= $d['last_name'] ?></option>
      <?php endforeach; ?>
    </select>
     
      <label>Visit Date*</label>
      <div class="row">
        <div class="input-field col s12">
          <input id="visit_date" type="date" name="visit_date" class="validate">
        </div>
      </div>
      
      <label>Visit Time*</label>
      <div class="row">
        <div class="input-field col s12">
          <input id="visit_time" type="time" name="visit_time" class="validate">
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="description"></textarea>
          <label for="description">Description</label>
        </div>
      </div>
      
       <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary blue-grey darken-4">Submit</button>
        </div>
      </fieldset>
      

    </form>
  </div>
  