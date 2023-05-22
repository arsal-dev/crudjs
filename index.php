<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDJS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container mt-5">
        <div class="alert alert-success d-none alert-dismissible fade show" role="alert" id="error-alert">
            <strong>Success!</strong> Data Saved Into the Database
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <div class="container mt-5">
        <form id="form">
            <div class="form-gourp">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control">
            </div>
            <div class="form-gourp">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control">
            </div>
            <div class="form-gourp">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control">
            </div>

            <input type="submit" class="btn btn-primary mt-3">
        </form>
    </div>


    <script>
        let form = document.getElementById('form');
        form.addEventListener('submit', async function(e){
            e.preventDefault();

            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;

            if(name.length == 0){
                alert('Please Enter Name!');
            }
            else if(email.length == 0) {
                alert('Please Enter Email');
            }
            else if(password.length == 0) {
                alert('Please Enter Password');
            }
            else {
                let obj = { name, email, password };
                
                let res = await fetch('insert.php', {
                    method: 'POST',
                    body: JSON.stringify(obj)
                });

                res = await res.text();
                res = JSON.parse(res);

                document.getElementById('name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('password').value = '';

                if(res.status == 200){
                    document.getElementById('error-alert').classList.remove('d-none');
                }
            }
        })
    </script>
</body>
</html>