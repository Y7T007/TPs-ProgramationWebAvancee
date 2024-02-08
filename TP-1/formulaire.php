<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
    <body>
        <form action="Formulaire_academic.php">
            <!-- Box "Renseignement Personnel" -->
        <h1>Renseignement Personnel</h1>
            
            <label for="Nom">Nom</label> 
                <input type="text" name="Nom" id="Nom" placeholder="Nom"> <br>
            
                <label for="Prenom">Prenom</label>
                <input type="text" name="Prenom" id="Prenom" placeholder="Prenom"> <br>
            
                <label for="Age">Age</label>
                <input type="number" name="Age" id="Age" placeholder="Age"> <br>
            
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" placeholder="Email"> <br>
            
                <label for="Gsm">Numero de telephone</label>
                <input type="tel" name="Gsm" id="Gsm" placeholder="Numero de telephone"> <br>
            
        <h1>Renseignement Academique</h1>

            <label for="Niveau">Vous etes en : </br> </label>
                
                <input type="radio" name="Niveau" id="2AP2" value="2AP2">
                <label for="2AP2">2AP2 |</label>

                <input type="radio" name="Niveau" id="GSTR" value="GSTR">
                <label for="GSTR">GSTR |</label>
                
                <input type="radio" name="Niveau" id="GI" value="GI">
                <label for="GI">GI |</label>
                
                <input type="radio" name="Niveau" id="SCM" value="SCM">
                <label for="SCM">SCM |</label>
                
                <input type="radio" name="Niveau" id="GC" value="GC">
                <label for="GC">GC |</label>
                
                <input type="radio" name="Niveau" id="MS" value="MS">
                <label for="MS">MS</label>

                
            <label for="Annee"><br></label>

                <input type="radio" name="Annee" id="1ere" value="1ere">
                <label for="1ere">1ere annee |</label>

                <input type="radio" name="Annee" id="2eme" value="2eme">
                <label for="2eme">2eme annee |</label>

                <input type="radio" name="Annee" id="3eme" value="3eme">
                <label for="3eme">3eme annee</label><br><br>
                

            <label for="modules">Modules suivi cet annee : <br></label>
                
                <label for="Pro-Av">Pro-Av</label>
                <input type="checkbox" name="modules" id="Pro-Av" value="Pro-Av">

                <label for="Compilation">Compilation</label>
                <input type="checkbox" name="modules" id="Compilation" value="Compilation">

                <label for="Reseau-Av">Reseau Av</label>
                <input type="checkbox" name="modules" id="Reseau-Av" value="Reseau-Av">

                <label for="Web-Avance">Web Avance</label>
                <input type="checkbox" name="modules" id="Web-Avance" value="Web-Avance">

                <label for="Poo">Poo</label>
                <input type="checkbox" name="modules" id="Poo" value="Poo">

                <label for="Bd">Bd</label>
                <input type="checkbox" name="modules" id="Bd" value="Bd"><br><br>

            <label for="nb_prj">Nombre de projets realises cette annee : </label>
                <select name="nb_prj" id="nb_prj">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>

            <label for="remarques"><br></label>
                <textarea name="remarques" id="remarques" cols="30" rows="10" placeholder="Remarques"></textarea>
                <br>

                <input type="file" name="fichier_joint" id="fichier_joint">


            
            
                <br><br><br>
            <input type="submit" value="Envoyer">

        </form>
    </body>
</html>