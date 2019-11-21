<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center py-5">TODO APP</h2>
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="What needs to be done"> &nbsp; &nbsp;
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </span>
                    </div>
                </form>

                <?php foreach ($tasks as $task) : ?>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <h6 class="mt-2"><?= $task->title ?></h6>
                        </div>
                        <div class="col-md-6 text-right">
                            <form>
                                <button type="submit" class="btn btn-light">Completed</button>
                                <button type="submit" class="btn btn-light">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>