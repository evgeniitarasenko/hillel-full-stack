<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-3">
    <div class="row">
        <div class="col">Review Types</div>
        <div class="col text-end">
            <a class="btn btn-success" href="/poll-types">List</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form class="row g-3 needs-validation" method="post" action="/poll-types/update">
                <input type="hidden" name="id" value="<?= $pollType->attributes['id'] ?>">

                <div class="col-md-4">
                    <label for="name" class="form-label">Name</label>
                    <input
                            type="text"
                            class="form-control <?php echo isset($_SESSION['errors']['name']) ? 'is-invalid' : '' ?>"
                            id="name"
                            name="name"
                            value="<?= $_SESSION['old']['name'] ?? $pollType->attributes['name'] ?>"
                    >

                    <?php if (isset($_SESSION['errors']['name'])): ?>
                        <div class="invalid-feedback">
                            <?php echo $_SESSION['errors']['name'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <h4>Add question</h4>
            <form class="row g-3 needs-validation" method="post" action="/poll-type-questions/store">
                <input type="hidden" name="poll_type_id" value="<?= $pollType->attributes['id'] ?>">

                <div class="col-md-4">
                    <label for="question" class="form-label">Question</label>
                    <input
                            type="text"
                            class="form-control <?php echo isset($_SESSION['errors']['question']) ? 'is-invalid' : '' ?>"
                            id="question"
                            name="question"
                            value="<?= $_SESSION['old']['question'] ?? null ?>"
                    >

                    <?php if (isset($_SESSION['errors']['question'])): ?>
                        <div class="invalid-feedback">
                            <?php echo $_SESSION['errors']['question'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <h4>Questions:</h4>
            <ul class="list-group">
                <?php foreach ($pollTypeQuestions as $pollTypeQuestion): ?>
                    <li class="list-group-item">
                        <?= $pollTypeQuestion->attributes['question'] ?>
                        <a href="/poll-type-questions/delete?id=<?= $pollTypeQuestion->attributes['id'] ?>&poll_type_id=<?= $pollType->attributes['id'] ?>">Delete</a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>

<?php $_SESSION['errors'] = []; ?>
<?php $_SESSION['old'] = []; ?>