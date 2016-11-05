<h5>All the scheduled visits for today</h5>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Visit ID</th>
                <th>Visit Date</th>
                <th>Time</th>
                <th>Description</th>
                <th>Select</th>
                <th>Edit</th>
                <th>Delete</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Visits as $v) : ?>
            <tr>
                <td><?= $v['visit_id'] ?></td>
                <td><?= $v['visit_date'] ?></td>
                <td><?= $v['time'] ?></td>
                <td><?= $v['description'] ?></td>
                <td><a href=".?action=search-details&type=patient&id=<?= $v['patient_id'] ?>">Select</a></td>
                <td><a href=".?action=edit-forms&type=visit&id=<?= $v['visit_id'] ?>">edit</a></td>
                
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_visit">
                        <input type="hidden" name="visit_id" value="<?= $v['visit_id'] ?>">
                        <input type="submit" class="btn btn-danger red" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
           
           

        </tbody>
    </table>