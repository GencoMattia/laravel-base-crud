const deleteForms = document.querySelectorAll("form.animal-delete");

deleteForms.forEach((deleteFormElement) => {
    deleteFormElement.addEventListener("submit", function(event){
        event.preventDefault();

        const name = this.getAttribute("data-animal-name");
        const animalId = this.getAttribute("data-animal-id");

        if(window.confirm(`Vuoi davvero cancellare l'animale ${name} con id ${animalId}?`) === true) {
            this.submit();
        }
    });
});
