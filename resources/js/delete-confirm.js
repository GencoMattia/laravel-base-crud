const deleteForms = document.querySelectorAll("form.animal-delete");

deleteForms.forEach((deleteFormElement) => {
    deleteFormElement.addEventListener("submit", function(event){
        event.preventDefault();

        if(window.confirm("Vuoi davvero cancellare questo animale?") === true) {
            this.submit();
        }
    });
});
