/**
 * Gestion des tâches
 * task.js
 */
window.onload = function () {
  // Écouteur d'évènement sur le formulaire
  document
    .querySelector("#formNewTask")
    .addEventListener("submit", function (event) {
      event.preventDefault(); // Empêche le formulaire de recharger la page

      fetch("addTask.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          task: document.querySelector("#task").value,
          process: document.querySelector("#process").value,
        }),
      })
        .then((response) => response.json())
        .then((response) => {
          // Si l'insertion en BDD c'est bien passé
          if (response === true) {
            // Vide un champ texte
            document.querySelector("#exampleModal").modal("hide");
            document.querySelector("#task").value = "";

            // Fermeture de la modale Bootstrap
          } else {
            alert("Problème lors de l'insertion en BDD");
          }
        })
        .catch((error) => {
          alert(error);
        });
    });
};
