<?php
// Set session variables
$_SESSION["visit_id"] =  $Visit['visit_id'];
$_SESSION["doctor_id"] = $Visit['doctor_id'] ;
?>

<h3>Edit Visit</h3>
<div class="row">
    <form class="col s6  white" action="." method="post">
    <input type="hidden" name="action" value="edit-visit" />
    
   
    <fieldset>
  
      <label>Visit Date<span class="red-text">*</span></label>
      <div class="row">
        <div class="input-field col s12">
          <input id="visit_date" type="date" name="visit_date" class="validate" value="<?= $Visit['visit_date'] ?>">
        </div>
      </div>
      
      <label>Time<span class="red-text">*</span></label>
      <div class="row">
        <div class="input-field col s12">
          <input id="visit_time" type="time" name="visit_time" class="validate" value="<?= $Visit['time'] ?>">
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <input id="description" type="text" name="description" value="<?= $Visit['description'] ?>">
          <label for="description">Description<span class="red-text">*</span></label>
        </div>
      </div>
      
       <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary blue-grey darken-4">Submit</button>
        </div>
      </fieldset>
      

    </form>
  </div>
  