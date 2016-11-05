<div class="container">
<h3>Add a new patient</h3>
<div class="row">
    <form class="col s6 white" action="." method="post">
    <input type="hidden" name="action" value="add-patient" />
    <input type="hidden" name="type" value="" />
   
       <fieldset>
    <p>Personal Information</p>
      <div class="row">
        <div class="input-field col s12">
          <input id="first_name" type="text" name="first_name" class="validate" value="<?= $_POST['first_name'] ?>">
          <label for="first_name">First Name<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="middle_name" type="text" name="middle_name" class="validate" value="<?= $_POST['middle_name'] ?>">
          <label for="middle_name">Middle Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="last_name" type="text" name="last_name" class="validate" value="<?= $_POST['last_name'] ?>">
          <label for="last_name">Last Name<span class="red-text">*</span></label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" name="email" class="validate" value="<?= $_POST['email'] ?>">
          <label for="middle_name">Email<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="phone" type="text" name="phone" class="validate" value="<?= $_POST['phone'] ?>">
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
          <input id="date_of_birth" type="date" name="date_of_birth" class="validate" value="<?= $_POST['date_of_birth'] ?>">
        </div>
      </div>
      </fieldset>
      
       <fieldset>
    <p>Address</p>
    
    <div class="row">
        <div class="input-field col s6">
          <input id="street" type="text" name="street" class="validate" value="<?= $_POST['street'] ?>">
          <label for="street">Street<span class="red-text">*</span></label>
        </div>
      </div>
      
       <div class="row">
        <div class="input-field col s6">
          <input id="city" type="text" name="city" class="validate" value="<?= $_POST['city'] ?>">
          <label for="city">City<span class="red-text">*</span></label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s6">
          <input id="state" type="text" name="state" class="validate" value="<?= $_POST['state'] ?>">
          <label for="state">State<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="zip" type="text" name="zip" class="validate" value="<?= $_POST['zip'] ?>">
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