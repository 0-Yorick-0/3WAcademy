window.addEventListener("load", function(){
    var searchCategory = document.getElementById("searchCategory");
    var mainCategories = document.querySelectorAll("#chooseCategory > li");
    var categories = document.querySelectorAll("#chooseCategory li li");

    searchCategory.addEventListener("keyup", function(){
        var searchText = this.value.trim().toLowerCase();
        var content;
        for(categorie of categories){
            content = categorie.textContent.toLowerCase();
            categorie.classList.toggle('hide', content.indexOf(searchText) == -1);
        }

        for(main of mainCategories){
            main.classList.toggle('hide', main.querySelectorAll("li:not(.hide)").length == 0);
        }
    });
});