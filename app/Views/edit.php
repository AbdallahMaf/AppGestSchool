<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

<h1 class="text-center  mt-5 mb-2 py-3">Update </h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">

            
                <?php if(isset($success)): ?>
                    <h3 class="alert alert-success text-center"><?php  echo $success; ?></h3>
                <?php endif; ?>
                <?php if(isset($error)): ?>
                    <h3 class="alert alert-danger text-center"><?php  echo $error; ?></h3>
                <?php endif; ?>


                <form class="p-5 border mb-5" method="POST" action="<?php url('etudiants/update'); ?>">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" required value="<?php echo $row['name']; ?>" name="name" class="form-control" id="name" >
                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                    </div>
                    <div class="form-group">
                        <label for="price">Prenom</label>
                        <input type="text" required class="form-control" value="<?php echo $row['prenon']; ?>" name="price" id="prenom">
                    </div>

                    <div class="form-group">
                        <label for="classen">Classe</label>
                        <input type="text" required class="form-control" value="<?php echo $row['classe']; ?>" name="classe" id="classe">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
                            
            </div>
        </div>
    </div>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>
