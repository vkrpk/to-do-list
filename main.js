window.onload = function () {
  var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'))
  var myModalEdit = new bootstrap.Modal(document.getElementById('modalEdit'))

  document
    .querySelector('#formEditTask')
    .addEventListener('submit', function (event) {
      event.preventDefault()
      fetch(`update.php`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          id: document.querySelector('#edit-id').value,
          task: document.querySelector('#edit-task').value,
          process: document.querySelector('#edit-process').value,
        }),
      })
        .then((response) => response.json())
        .then((response) => {
          let td = document.querySelector(
            `button[data-id="${response.id}"]`
          ).parentNode
          let tr = td.parentNode
          tr.innerHTML = `
                  <td>${response.id}</td>
                  <td>${response.task}</td>
                  <td>${response.process}</td>
                  <td>${response.created_at}</td>
                  <td>
                    <button type="button" class="btn btn-danger"  data-id="${response.id}">Supprimer</button>
                    <button type="button" class="btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit" data-id="${response.id}">Modifier</button>
                  </td>
            `
          eventListenerDelete()
          remplissageForm()
          myModalEdit.hide()
        })
        .catch((error) => {
          alert(error)
        })
    })

  getAllList(0)

  document
    .querySelector('#formAddTask')
    .addEventListener('submit', function (event) {
      event.preventDefault()
      fetch('insert.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          task: document.querySelector('#task').value,
          process: document.querySelector('#process').value,
        }),
      })
        .then((response) => response.json())
        .then((response) => {
          if (response === true) {
            myModal.hide()
            getAllList(1)
            document.querySelector('#task').value = ''
            document.querySelector('#process').value = ''
          } else {
            alert("Problème lors de l'insertion en BDD")
          }
        })
        .catch((error) => {
          alert(error)
        })
    })
}

function eventListenerDelete() {
  document.querySelectorAll('.btn-danger').forEach((button) => {
    button.addEventListener('click', function () {
      let id = button.dataset.id

      fetch(`deleteTask.php?id=${id}`)
        .then((response) => response.json())
        .then((response) => {
          let td = button.parentNode
          let tr = td.parentNode
          tr.remove()
        })
        .catch((error) => {
          alert(error)
        })
    })
  })
}

function remplissageForm() {
  document.querySelectorAll('.btn-edit').forEach((button) => {
    button.addEventListener('click', function () {
      let id = button.dataset.id
      fetch(`findTask.php?id=${id}`)
        .then((response) => response.json())
        .then((response) => {
          document.querySelector('#edit-task').value = `${response.task}`
          document.querySelector('#edit-process').value = `${response.process}`
          document.querySelector('#edit-id').value = `${response.id}`
        })
        .catch((error) => {
          alert(error)
        })
    })
  })
}

function getAllList(lastTask) {
  fetch(`allList.php?last=${lastTask}`)
    .then((response) => response.json())
    .then((response) => {
      response.forEach((value) => {
        let tr = document.createElement('tr')
        tr.innerHTML = `
                  <td>${value.id}</td>
                  <td>${value.task}</td>
                  <td>${value.process}</td>
                  <td>${value.created_at}</td>
                  <td>
                    <button type="button" class="btn btn-danger"  data-id="${value.id}">Supprimer</button>
                    <button type="button" class="btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit" data-id="${value.id}">Modifier</button>
                  </td>
            `
        document.querySelector('tbody').appendChild(tr)
      })
      eventListenerDelete()
      remplissageForm()
    })
    .catch((error) => {
      alert(error)
    })
}
