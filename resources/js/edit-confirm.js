document.querySelector("form.edit-animal").addEventListener("submit", function(event){
    event.preventDefault();

    if (window.confirm("Sei sicuro?") === true) {
        this.submit();
    }
});
