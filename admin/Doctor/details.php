
<div class="row">
        <div class="col s12 m12">
          <div class="card">
            <div class="black-text center">
              <span class="card-title black-text blue lighten-5"><?= $Doctor['first_name'] ?> <?= $Doctor['middle_name'] ?> <?= $Doctor['last_name'] ?></span>
              <p class="black-text"><b>GENDER:</b> <?= $Doctor['gender'] ?></p>
              <p class="black-text"><b>DATE OF BIRTH:</b> <?= $Doctor['date_of_birth'] ?></p>
              <p class="black-text"><b>PHONE:</b> <?= $Doctor['phone'] ?></p>
              <p class="black-text"><b>Email:</b> <?= $Doctor['email'] ?></p>
              <a class="blue-text" href=".?action=edit-forms&type=doctor&id=<?= $Doctor['doctor_id'] ?>">Edit</a>
            </div >
            
            <div class="center">
            <h5 >Address</h5>
            <p><?= $Address['street'] ?></p>
            <p><?= $Address['city'] ?>, <?= $Address['state'] ?> <?= $Address['zip_code'] ?></p>
            <a class="blue-text" href=".?action=edit-forms&type=patient-address&id=<?= $Doctor['address_id'] ?>">Edit</a>
            </div>
     
            
            <div class="card-action blue-grey darken-4">
              <a class="white-text" href=".?action=view-visits&type=recent-doctor-visits&id=<?= $Doctor['doctor_id'] ?>">View Last 20 Visits</a>
              <a class="white-text" href=".?action=view-visits&type=doctor&id=<?= $Doctor['doctor_id'] ?>">View All Visits</a>
              <br />
              <br />
              <form action="." method="post">
                        <input type="hidden" name="action" value="delete_doctor">
                        <input type="hidden" name="doctor_id" value="<?= $Doctor['doctor_id'] ?>">
                        <input type="submit" class="btn btn-danger red" value="Delete">
              </form>
              
            </div>
          </div>
        </div>
</div>