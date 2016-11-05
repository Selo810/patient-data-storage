
<h3>Add Doctor</h3>
<div class="row">
    <form class="col s6 white" action="." method="post">
    <input type="hidden" name="action" value="add-doctor" />
    <input type="hidden" name="type" value="" />
   
    <fieldset>
    <p>Personal Information</p>
      <div class="row">
        <div class="input-field col s12">
          <input id="first_name" type="text" name="first_name" class="validate">
          <label for="first_name">First Name<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="middle_name" type="text" name="middle_name" class="validate">
          <label for="middle_name">Middle Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="last_name" type="text" name="last_name" class="validate">
          <label for="last_name">Last Name<span class="red-text">*</span></label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" name="email" class="validate">
          <label for="middle_name">Email<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="phone" type="text" name="phone" class="validate">
          <label for="phone">Phone<span class="red-text">*</span></label>
        </div>
      </div>
        
      </fieldset>
      
       <fieldset>
    <p>Address</p>
    
    <div class="row">
        <div class="input-field col s6">
          <input id="street" type="text" name="street" class="validate">
          <label for="street">Street<span class="red-text">*</span></label>
        </div>
      </div>
      
       <div class="row">
        <div class="input-field col s6">
          <input id="city" type="text" name="city" class="validate">
          <label for="city">City<span class="red-text">*</span></label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s6">
          <input id="state" type="text" name="state" class="validate">
          <label for="state">State<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="zip" type="text" name="zip" class="validate">
          <label for="zip">Zip<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary blue-grey darken-4">Submit</button>
    </div>
      </fieldset>
       
    </form>
  </div>
 