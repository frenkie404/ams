(function () {
  const server = "http://localhost:80";
  const actionButtons = document.querySelectorAll("[data-action]");
  const forms = document.querySelectorAll("form.async");
  console.log(forms);
  const output = document.getElementById("output");

  actionButtons.forEach((actionButton) => {
    actionButton.addEventListener("click", ({ currentTarget }) => {
      const action = currentTarget.dataset.action;
      console.log(action);
      if (action === "get-teachers") {
        return getTeachers();
      }
      fetch(`/controllers/admin/currentAction.php?action=${action}`)
        .then((res) => {
          if (res.status === 202) {
            window.location.reload();
          }
        })
        .catch((err) => console.log(err));
    });
  });

  forms.forEach((form) => {
    const { action } = form;
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      const data = new FormData(form);
      fetch(action, {
        method: "post",
        body: data,
      })
        .then(({ status }) => {
          if (status >= 200 && status < 300) {
            console.log("success");
          } else {
            console.log("failure");
          }
        })
        .catch((err) => console.log(err));
    });
  });

  async function getTeachers() {
    try {
      const formData = new FormData();
      formData.append("table_to_read_from", "teachers");

      const res = await fetch(`${server}/controllers/admin/read.php`, {
        "Content-Type": "application/x-www-form-urlencoded",
        method: "POST",
        body: formData,
      });
      const data = await res.json();
      injectHTMLToOutput(data);
    } catch (error) {
      console.error(error);
    }
  }

  async function editTeacher(currentTarget) {
    console.log("should edit the teacher");
  }

  async function deleteTeacher(currentTarget) {
    console.log("should delete the teacher");
  }

  function injectHTMLToOutput(data) {
    output.innerHTML = `
        <table class="w-full">
            <tr class="mb-2 rounded">
                <th class="p-2 text-center">Name</th>
                <th class="p-2 text-center">Email</th>
                <th class="p-2 text-center">Faculty</th>
                <th class="p-2 text-center">Semester</th>
                <th class="p-2 text-center">Subject</th>
                <th class="p-2 text-center">Admin Actions</th>
            </tr>
            ${data.map((teacher) => populateRows(teacher)).join("")}
        </table>
      `;
    adminActions();
  }

  function populateRows(teacher) {
    const { id, fullname, email, faculty, semester, associated_subject } =
      teacher;
    return `
        <tr data-id="${id}" class="bg-blue-400 rounded">
            <td class="p-2 text-center">${fullname}</td>
            <td class="p-2 text-center">${email}</td>
            <td class="p-2 text-center">${faculty}</td>
            <td class="p-2 text-center">${semester}</td>
            <td class="p-2 text-center">${associated_subject}</td>
            <td class="p-2 text-center bg-white">
                <button data-admin-action="edit-teacher" class="btn mr-4">Edit</button>
                <button data-admin-action="delete-teacher" class="btn">Delete</button>    
            </td>
        </tr>
    `;
  }

  function adminActions() {
    const actionButtons = document.querySelectorAll(["data-admin-action"]);
    actionButtons.forEach((action) => {
      action.addEventListener("click", ({ currentTarget }) => {
        console.log(currentTarget);
      });
    });
  }
})();
