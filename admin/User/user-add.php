<div class="container">
<h3>Add a new user</h3>
<div class="row">
    <form class="col s6 white" action="." method="post">
    <input type="hidden" name="action" value="add-user" />
    <input type="hidden" name="type" value="" />
   
       <fieldset>
    <p>User Information</p>
      <div class="row">
        <div class="input-field col s12">
          <input id="username" type="text" name="username" class="validate" value="<?= $_POST['username'] ?>">
          <label for="username">USERNAME<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="password" class="validate">
          <label for="password">PASSWORD<span class="red-text">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password2" type="password" name="password2" class="validate">
          <label for="password2">RE-ENTER PASSWORD<span class="red-text">*</span></label>
        </div>
      </div>
       
      <label>USER TYPE<span class="red-text">*</span></label>
      <p>
      <input value="admin" name="type" type="radio" id="admin" />
      <label for="admin">Admin</label>
      </p>
      <p>
      <input value="auth" name="type" type="radio" id="auth" />
      <label for="auth">Auth</label>
      </p>
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary blue-grey darken-4">Submit</button>
    </div>
      </fieldset>
       
    </form>
  </div>
 </div>     