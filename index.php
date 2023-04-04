<?php require_once 'elements/header.php';?>

<h1>Liste des tâches</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Nouvelle tâche
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nouvelle tâche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" id="formAddTask">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="task">Description</label>
                        <textarea class="form-control" id="task" rows="3" required name="task"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="process">État</label>
                        <select class="form-select" aria-label="Default select example" id="process" name="process">
                            <option selected value="">Selectionnez</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminé">Terminé</option>
                            <option value="À faire">À faire</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tâche à réaliser</th>
            <th>Statut</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Requête AJAX -->
    </tbody>
</table>

<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edition d'une tâche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" id="formEditTask">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="task">Description</label>
                        <textarea class="form-control" id="edit-task" rows="3" required name="task">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="process">État</label>
                        <select class="form-select" aria-label="Default select example" id="edit-process" name="process">
                            <option selected value="">Selectionnez</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminé">Terminé</option>
                            <option value="À faire">À faire</option>
                        </select>
                    </div>
                    <input type="hidden" id="edit-id" name="edit-id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
    </div>
</div>
<?php require_once 'elements/footer.php'?>