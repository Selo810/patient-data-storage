
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Select</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $p) : ?>
            <tr>
                <td><?= $p['patient_id'] ?></td>
                <td><?= $p['first_name'] ?> <?= $p['middle_name'] ?> <?= $p['last_name'] ?></td>
                <td><?= $p['phone'] ?></td>
                <td><?= $p['email'] ?></td>
                <td><a href=".?action=search-details&type=patient&id=<?= $p['patient_id'] ?>">Select</a></td>
            </tr>
            <?php endforeach ?>
           
           

        </tbody>
    </table>