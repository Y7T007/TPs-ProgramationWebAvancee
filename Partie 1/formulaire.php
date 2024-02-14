<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form action="recap.php" method="post" enctype="multipart/form-data">
            <fieldset class="form-group">
                <legend>Renseignement Personnel</legend>
                <div class="form-group">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" name="Nom" id="Nom" placeholder="Nom" value="<?php echo isset($_SESSION['Nom']) ? $_SESSION['Nom'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Prenom">Prenom</label>
                    <input type="text" class="form-control" name="Prenom" id="Prenom" placeholder="Prenom" value="<?php echo isset($_SESSION['Prenom']) ? $_SESSION['Prenom'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Age">Age</label>
                    <input type="number" class="form-control" name="Age" id="Age" placeholder="Age" value="<?php echo isset($_SESSION['Age']) ? $_SESSION['Age'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="Email" id="Email" placeholder="Email" value="<?php echo isset($_SESSION['Email']) ? $_SESSION['Email'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Gsm">Numero de telephone</label>
                    <input type="tel" class="form-control" name="Gsm" id="Gsm" placeholder="Numero de telephone" value="<?php echo isset($_SESSION['Gsm']) ? $_SESSION['Gsm'] : ''; ?>" required>
                </div>
            </fieldset>


            <fieldset class="form-group">
                <legend>Renseignement Academique</legend>
                <div class="form-group">
                    <label for="Niveau">Vous etes en : </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Niveau" id="2AP2" value="2AP2" <?php echo isset($_SESSION['Niveau']) && $_SESSION['Niveau'] == '2AP2' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="2AP2">2AP2</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Niveau" id="GSTR" value="GSTR" <?php echo isset($_SESSION['Niveau']) && $_SESSION['Niveau'] == 'GSTR' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="GSTR">GSTR</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Niveau" id="GI" value="GI" <?php echo isset($_SESSION['Niveau']) && $_SESSION['Niveau'] == 'GI' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="GI">GI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Niveau" id="SCM" value="SCM" <?php echo isset($_SESSION['Niveau']) && $_SESSION['Niveau'] == 'SCM' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="SCM">SCM</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Niveau" id="GC" value="GC" <?php echo isset($_SESSION['Niveau']) && $_SESSION['Niveau'] == 'GC' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="GC">GC</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Niveau" id="MS" value="MS" <?php echo isset($_SESSION['Niveau']) && $_SESSION['Niveau'] == 'MS' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="MS">MS</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Annee">Annee</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Annee" id="1ere" value="1ere" <?php echo isset($_SESSION['Annee']) && $_SESSION['Annee'] == '1ere' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="1ere">1ere annee</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Annee" id="2eme" value="2eme" <?php echo isset($_SESSION['Annee']) && $_SESSION['Annee'] == '2eme' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="2eme">2eme annee</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Annee" id="3eme" value="3eme" <?php echo isset($_SESSION['Annee']) && $_SESSION['Annee'] == '3eme' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="3eme">3eme annee</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="modules">Modules suivi cet annee :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="modules[]" id="Pro-Av" value="Pro-Av" <?php echo isset($_SESSION['modules']) && in_array('Pro-Av', $_SESSION['modules']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="Pro-Av">Pro-Av</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="modules[]" id="Compilation" value="Compilation" <?php echo isset($_SESSION['modules']) && in_array('Compilation', $_SESSION['modules']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="Compilation">Compilation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="modules[]" id="Reseau-Av" value="Reseau-Av" <?php echo isset($_SESSION['modules']) && in_array('Reseau-Av', $_SESSION['modules']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="Reseau-Av">Reseau Av</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="modules[]" id="Web-Avance" value="Web-Avance" <?php echo isset($_SESSION['modules']) && in_array('Web-Avance', $_SESSION['modules']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="Web-Avance">Web Avance</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="modules[]" id="Poo" value="Poo" <?php echo isset($_SESSION['modules']) && in_array('Poo', $_SESSION['modules']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="Poo">Poo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="modules[]" id="Bd" value="Bd" <?php echo isset($_SESSION['modules']) && in_array('Bd', $_SESSION['modules']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="Bd">Bd</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nb_prj">Nombre de projets realises cette annee :</label>
                    <select class="form-control" name="nb_prj" id="nb_prj">
                        <option value="0" <?php echo isset($_SESSION['nb_prj']) && $_SESSION['nb_prj'] == '0' ? 'selected' : ''; ?>>0</option>
                        <option value="1" <?php echo isset($_SESSION['nb_prj']) && $_SESSION['nb_prj'] == '1' ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo isset($_SESSION['nb_prj']) && $_SESSION['nb_prj'] == '2' ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?php echo isset($_SESSION['nb_prj']) && $_SESSION['nb_prj'] == '3' ? 'selected' : ''; ?>>3</option>
                        <option value="4" <?php echo isset($_SESSION['nb_prj']) && $_SESSION['nb_prj'] == '4' ? 'selected' : ''; ?>>4</option>
                        <option value="5" <?php echo isset($_SESSION['nb_prj']) && $_SESSION['nb_prj'] == '5' ? 'selected' : ''; ?>>5</option>
                    </select>
                </div>
            </fieldset>

            <fieldset class="form-group">
                <legend>Vos Remarques</legend>
                <div class="form-group">
                    <label for="remarques">Remarques</label>
                    <textarea class="form-control" name="remarques" id="remarques" rows="3" placeholder="Remarques" ><?php echo $_SESSION['remarques'] ?? ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="fichier_joint">Fichier Joint</label>
                    <input type="file" class="form-control-file" name="fichier_joint" id="fichier_joint">
                </div>
                <?php
                // Display the uploaded file name
                if (isset($_SESSION['fichier_joint_name'])) {
                    echo "File has been uploaded: ".$_SESSION['fichier_joint_name'];
                }
                ?>
            </fieldset>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br><br><br><br>
    </div>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Include Bootstrap CSS for modal -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Bootstrap JS for modal -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('form').on('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: 'recap.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // Create a modal and append to body
                        var modal = `
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ${data}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                        $('body').append(modal);
                        $('#myModal').modal('show');
                    }
                });
            });
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>