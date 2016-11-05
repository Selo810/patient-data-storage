<div class="container">
<div class="row">
    
    <form class="col s12" action="." method="POST">
    <input type="hidden" name="action" value="search-patient" />
    <input type="hidden" name="type" value="" />

    <div class="row">
       <div class="input-field col s6">
            <label for="first_name">Search by: First Name, Last Name, or Phone</label><br />
          <input id="patient_id" type="text" class="validate" name="search">
          
        </div>
        <!--
        <div class="input-field col s5">
            <label for="last_name">Last Name</label><br />
          <input id="last_name" type="text" class="validate" name="last_name">
          
          
        </div>--->
        <br />
        <br />
        <button type="submit" class="btn btn-primary blue-grey darken-4"><i class="material-icons">search</i></button>
       
       </div>
      
    </form>
    
    
  </div>
 </div>