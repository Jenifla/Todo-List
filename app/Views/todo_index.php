<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <title>Todo List</title>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <form action="<?= base_url('create-todo') ?>" method="post">
            <div class="mb-3">
                <label for="todo" class="form-label">Tambahkan Acara</label>
                <input type="text" name="todo" class="form-control" id="todo" placeholder="Isikan Acara">
            </div>
            <div class="mb-3">
                <label for="deadline" class="form-label">Deadline</label>
                <input type="date" name="deadline" class="form-control" id="deadline">
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
        <br>
  
        <?php if (!empty($todos)) : ?>
   <h2>Todo</h2>
    <div class="mb-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Acara</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todos as $key => $todo) : ?>
                <?php if ($todo->status == 0) : ?> 
                    <tr>
                        <td><?= $todo->id ?></td>
                        <td><?= $todo->todo ?></td>
                        <td><?= date('d/m/Y', strtotime($todo->deadline)) ?></td>
                        <td>
                            <span class="badge rounded-pill bg-danger">Belum Selesai</span>
                        </td>
                        <td>
                            <a href="<?= base_url('done-todo/' . $todo->id) ?>" class="btn btn-primary">Selesaikan</a>
                            <a href="<?= base_url('edit-todo/' . $todo->id) ?>" class="btn btn-secondary">Edit</a>
                            <a href="<?= base_url('hapus-todo/' . $todo->id) ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <h2>Complete</h2>
    <div class="mb-3">
    <table class="table table-stripe d">
        <thead>
            <tr>
                <th>No</th>
                <th>Acara</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todos as $key => $todo) : ?>
                <?php if ($todo->status == 1) : ?> 
                    <tr>
                        <td><?= $todo->id ?></td>
                        <td><?= $todo->todo ?></td>
                        <td><?= date('d/m/Y', strtotime($todo->deadline)) ?></td>
                        <td>
                            <span class="badge rounded-pill bg-success">Selesai</span>
                        </td>
                        <td>
                            <a href="<?= base_url('hapus-todo/' . $todo->id) ?>" class="btn btn-outline-danger">Hapus</a>
                            <a href="<?= base_url('restore-todo/' . $todo->id) ?>" class="btn btn-outline-primary">Restore</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
    </div>
</body>
</html>
