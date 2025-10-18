    <?php
    require_once 'connexion_bd.php';
    require_once 'fonctions.php';

    $categories = getAllCategories($conn);
    $pays = getAllPays($conn);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/site_web/css/admin/admin.css">
        <link rel="stylesheet" type="text/css" href="/site_web/css/header/header.css">
        <title>Exploratio_nln</title>
        <link rel="icon" type="image/PNG" href="/site_web/img/photo_profil.png">
        <link href="https://fonts.googleapis.com/css2?family=Antonio&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <main>
            <div class="container">
                <h1>Ajouter un lieu</h1>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug :</label>
                        <input type="text" id="slug" name="slug" required>
                    </div>
                    <div class="form-group">
                        <label for="categorie">Catégorie :</label>
                        <select id="categorie" name="categorie" required>
                            <option value="">-- Choisir une catégorie --</option>
                            <?php
                            while ($categorie = $categories->fetch_assoc()) {
                                printf(
                                    '<option value=%s>%s</option>',
                                    htmlspecialchars($categorie['nom_categorie']),
                                    htmlspecialchars($categorie['nom_categorie'])
                                );
                            }
                            ?>
                            <option value="autre">Autre...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pays">Pays :</label>
                        <select id="pays" name="pays" required>
                            <option value="">-- Choisir un Pays --</option>
                            <?php
                            while ($unPays = $pays->fetch_assoc()) {
                                printf(
                                    '<option value=%s>%s</option>',
                                    htmlspecialchars($unPays['pays']),
                                    htmlspecialchars($unPays['pays'])
                                );
                            }
                            ?>
                            <option value="autre">Autre...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_explo">Date exploration :</label>
                        <input type="text" id="date_explo" name="date_explo" placeholder="Sous la forme MM/AAAA" required>
                    </div>
                    <div class="form-group">
                        <label for="histoire">Histoire du lieu :</label>
                        <textarea id="histoire" name="histoire" rows="6" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="paragraphe1">Paragraphe n°1 :</label>
                        <textarea id="paragraphe1" name="paragraphe1" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Images :</label>
                        <div class="choix-orientation">
                            <button type="button" class="btn-orientation" data-orientation="vertical">Vertical</button>
                            <button type="button" class="btn-orientation" data-orientation="horizontal">Horizontal</button>
                            <button type="button" class="btn-retour" id="btn-retour">Annuler la dernière image</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ordre">Ordre :</label>
                        <input type="text" name="ordre" id="ordre" readonly>
                    </div>
                    <script src="/site_web/js/admin.js">
                    </script>
                    <button type="submit" class="enregistrer">Enregistrer</button>
                </form>
            </div>
        </main>
    </body>
    </html>