<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Feed</title>
    <style>
        .modal-header {
            background: #34c1c6;
            color: #fff;
        }
        
        .required:after {
            content: "*";
            color: red;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <button type="button" class="btn btn-primary center" data-bs-toggle="modal" data-bs-target="#myModal">Start a post</button>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ">Create a post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                    <form action="/postbox/display.php" method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">About your post</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name='description' rows="3"></textarea>
                            </div>
                            <div class="mb-3" en>
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" name="file" id="formFile">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary " name='submit'>Submit</button>
                                <button type="submit" class="btn btn-danger">Cancel</button>
                           </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>