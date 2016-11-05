
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
            <?php foreach ($result as $d) : ?>
            <tr>
                <td><?= $d['doctor_id'] ?></td>
                <td><?= $d['first_name'] ?> <?= $d['middle_name'] ?> <?= $d['last_name'] ?></td>
                <td><?= $d['phone'] ?></td>
                <td><?= $d['email'] ?></td>
                <td><a href=".?action=search-details&type=doctor&id=<?= $d['doctor_id'] ?>">Select</a></td>
            </tr>
            <?php endforeach ?>
           
           

        </tbody>
    </table>