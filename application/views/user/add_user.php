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
    <div class="card" style="width: 18rem;">
        <div class="card-body">



            <form method="post" action="<?= base_url() ?>user/add" class="form" enctype="multipart/form-data">
                <span class="signup">Sign Up</span>
                <input name="first_name" type="text" placeholder="Your first name" class="form--input">
                <input name="last_name" type="text" placeholder="Your Last name" class="form--input">
                <input name="age" type="date" class="form--input">
                <label for="userfile">Profile Picture</label>
                <input type="file" name="userfile" class="form--input" accept="image/*">


                <button class="form--submit">
                    Sign up
                </button>
            </form>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    Added successfuly
                </div>
            <?php }
            ?>
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger" role="alert">
                    Something went wrong!
                </div>
            <?php }
            ?>



        </div>
    </div>
</div>


<?php $this->load->view('includes/footer'); ?>