function Tools(slate){

    this.slate = slate;
    this.toolbar = this.slate.canvas.nextElementSibling;
    this.colorSelectors = this.toolbar.querySelectorAll('div.pen-color');
    this.sizeSelector = this.toolbar.querySelector('select.pen-size');
    this.clearButton = this.toolbar.querySelector('button.clear');
    // this.saveButton = this.toolbar.querySelector('button.save');

    for(let colorSelector of this.colorSelectors){
        colorSelector.addEventListener("click", this.changePenColor.bind(this));
    }

    this.sizeSelector.addEventListener("change", this.changePenSize.bind(this));

    this.clearButton.addEventListener("click", this.clear.bind(this));

    // this.saveButton.addEventListener("click", this.save.bind(this));
}

Tools.prototype.changePenColor = function(e) {
    e.preventDefault();
    this.slate.pen.setColor(e.currentTarget.dataset.color);
};

Tools.prototype.changePenSize = function(e) {
    e.preventDefault();
    this.slate.pen.setSize(e.target.value);
};

Tools.prototype.clear = function(e){
    e.preventDefault();
    this.slate.context.clearRect(
        0,
        0,
        this.slate.canvas.width,
        this.slate.canvas.height
    );
};

// Tools.prototype.save = function(){
//     var aElt = document.createElement('a');
//     var callback = document.querySelector('div.callback');
//     aElt.textContent = "Voici un lien vers votre chef d'oeuvre";
//     aElt.setAttribute('href', this.slate.canvas.toDataURL());
//     aElt.setAttribute('download', "mypainting.png");
//     callback.appendChild(aElt);
// };



