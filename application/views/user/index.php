<?php $this->load->view('includes/header'); ?>


<style>
    .form {
        background-color: white;
        padding: 3.125em;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 5px 5px 15px -1px rgba(0, 0, 0, 0.75);
    }

    .signup {
        color: rgb(77, 75, 75);
        text-transform: uppercase;
        letter-spacing: 2px;
        display: block;
        font-weight: bold;
        font-size: x-large;
        margin-bottom: 0.5em;
    }

    .form--input {
        width: 100%;
        margin-bottom: 1.25em;
        height: 40px;
        border-radius: 5px;
        border: 1px solid gray;
        padding: 0.8em;
        font-family: 'Inter', sans-serif;
        outline: none;
    }

    .form--input:focus {
        border: 1px solid #639;
        outline: none;
    }

    .form--marketing {
        display: flex;
        margin-bottom: 1.25em;
        align-items: center;
    }

    .form--marketing>input {
        margin-right: 0.625em;
    }

    .form--marketing>label {
        color: grey;
    }

    .checkbox,
    input[type="checkbox"] {
        accent-color: #639;
    }

    .form--submit {
        width: 50%;
        padding: 0.625em;
        border-radius: 5px;
        color: white;
        background-color: #639;
        border: 1px dashed #639;
        cursor: pointer;
    }

    .form--submit:hover {
        color: #639;
        background-color: white;
        border: 1px dashed #639;
        cursor: pointer;
        transition: 0.5s;
    }

    body {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10vh;
    }
</style>

<div class="container ">
    <div class="card" >
        <div class="card-body">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">date of birth</th>
                        <th scope="col">image</th>
                        <th scope="col">Advanced</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) {?>
                        <tr>
                            <th scope="row"><?=$user['id']?></th>
                            <td><?=$user['first_name']?></td>
                            <td><?=$user['last_name']?></td>
                            <td><?=$user['age']?></td>
                            <td><img width="100" src="<?php echo 'http://localhost/ci_crud/uploads/' . $user['image'] ?>" ></td>
                            <td>

                            <a href="<?= base_url('user/edit/'.$user['id']) ?>" class="btn btn-sm btn-primary">Update</a>
                            <a href="<?= base_url('user/delete/'.$user['id']) ?>" class="btn btn-sm btn-danger ">Delete</a>
                            
                            </td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>











        </div>
    </div>
</div>


<?php $this->load->view('includes/footer'); ?>