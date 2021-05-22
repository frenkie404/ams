(function () {
  const server = "http://localhost:80";
  const actionButtons = document.querySelectorAll("[data-action]");
  const forms = document.querySelectorAll("form.async");
  const output = document.getElementById("output");

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
})();
