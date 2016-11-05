

<div class="row">
        <div class="col s12 m12">
          <div class="card">
            <div class="black-text center">
              <span class="card-title black-text blue lighten-5"><?= $Patient['first_name'] ?> <?= $Patient['middle_name'] ?> <?= $Patient['last_name'] ?></span>
              <p class="black-text"><b>GENDER:</b> <?= $Patient['gender'] ?></p>
              <p class="black-text"><b>DATE OF BIRTH:</b> <?= $Patient['date_of_birth'] ?></p>
              <p class="black-text"><b>DATE JOINED:</b> <?= $Patient['date_joined'] ?></p>
              <p class="black-text"><b>PHONE:</b> <?= $Patient['phone'] ?></p>
              <p class="black-text"><b>Email:</b> <?= $Patient['email'] ?></p>
              <a class="blue-text" href=".?action=edit-forms&type=patient&id=<?= $Patient['patient_id'] ?>">Edit</a>
            </div >
            <div class="center">
            <h5 >Address</h5>
            <p></p><?= $Address['street'] ?></p>
            <p><?= $Address['city'] ?>, <?= $Address['state'] ?> <?= $Address['zip_code'] ?></p>
            <a class="blue-text" href=".?action=edit-forms&type=patient-address&id=<?= $Patient['address_id'] ?>">Edit</a>
            </div>
            
            <div class="card-action blue-grey darken-4">
              <a class="white-text" href=".?action=view-visits&type=recent-patient-visits&id=<?= $Patient['patient_id'] ?>">Last 10 Visits</a>
              <a class="white-text" href=".?action=view-visits&type=patient&id=<?= $Patient['patient_id'] ?>">View All Visits</a>
              <a class="white-text" href=".?action=add-forms&type=visit&id=<?= $Patient['patient_id'] ?>">Schedule New Visit</a>
              <br />
              <br />
              <form action="." method="post">
                        <input type="hidden" name="action" value="delete_patient">
                        <input type="hidden" name="patient_id" value="<?= $Patient['patient_id'] ?>">
                        <input type="submit" class="btn btn-danger red" value="Delete">
                    </form>
              
            </div>
          </div>
        </div>
</div>