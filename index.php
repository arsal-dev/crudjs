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
<body id="body">

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


    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ARE YOU SURE?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO!</button>
        <button type="button" id="delete_yes" class="btn btn-danger" data-bs-dismiss="modal">YES!</button>
      </div>
    </div>
  </div>
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
                    showData();
                    // form.classList.add('d-none');
                    // form.style.display = 'none';
                }
            }
        })

        window.addEventListener('load', function(){
            showData();
            let tbody = document.getElementById('tbody');
        });


        async function showData(){
            tbody.innerHTML = '';
            let res = await fetch('get_data.php');
            res = await res.text();
            res = JSON.parse(res);
            
            let data = res.message;

            for(let i of data){
                tbody.innerHTML += 
                `<tr>
                    <th scope="row">${i.id}</th>
                    <td>${i.name}</td>
                    <td>${i.email}</td>
                    <td>${i.password}</td>
                    <td><button class="btn btn-primary">UPDATE</button>&nbsp;&nbsp;<button class="btn btn-danger dlt" id="${i.id}" data-bs-toggle="modal" data-bs-target="#delete_modal">DELETE</button></td>
                </tr>`; 
            }
            delete_data();
        }


        function delete_data(){
            let dlt = document.querySelectorAll('.dlt');
            for(let i of dlt){
                i.addEventListener('click', function(){
                    let dlt_id = this.id;

                    let delete_yes = document.getElementById('delete_yes');
                    delete_yes.addEventListener('click', async function(){
                        let res = await fetch('delete_data.php',{
                            method: 'POST',
                            body: JSON.stringify(dlt_id)
                        });
                        res = await res.text();
                        res = JSON.parse(res);
                        showData();
                    });
                });
            }
        }


    </script>
</body>
</html>