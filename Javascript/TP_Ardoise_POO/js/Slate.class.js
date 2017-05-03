function Slate(idCanvas){

    this.canvas = document.querySelector(idCanvas);
    this.startLocation = {};
    this.isDrawing = false;
    //création d'un objet context possedant des proprietés pour manipuler le canvas
    this.context = this.canvas.getContext('2d');

    //bind(this) permet de forcer la méthode à faire référence à l'objet, et non à l'élément courant
    this.canvas.addEventListener("mousedown", this.onMouseDown.bind(this));
    // this.canvas.addEventListener("mouseup", this.stopDrawing.bind(this));
    // this.canvas.addEventListener("mouseleave", this.stopDrawing.bind(this));
    //Les deux méthodes ci-dessus peuvent être combinées en une seule, comme ci-dessous
    this.canvas.on("mouseup mouseleave", this.stopDrawing.bind(this));
    this.canvas.addEventListener("mousemove", this.onMouseMove.bind(this));

    this.pen = new Pen(this.context);
    this.tools = new Tools(this);
}

Slate.prototype.getMouseLocation = function(e) {

    //récupération d'un objet possédant 6 propriétés : top, left, bottom, right, width, height, permettant de le localiser
    var canvasLocation = this.canvas.getBoundingClientRect();

    var relativeX = e.clientX - canvasLocation.left;
    var relativeY = e.clientY - canvasLocation.top;
    var mouseCoord = {
        X: relativeX,
        Y: relativeY
    };
    return mouseCoord;
};

Slate.prototype.onMouseDown = function(e){
    this.isDrawing = true;
    this.startLocation.x = this.getMouseLocation(e).X;
    this.startLocation.y = this.getMouseLocation(e).Y;

    //début du dessin
    this.context.beginPath();

    //Dessine un trait entre les coordonées x1,y1 et x2, y2
    this.context.moveTo(this.startLocation.x, this.startLocation.y);
};

Slate.prototype.stopDrawing = function(){
    this.isDrawing = false;
};

Slate.prototype.onMouseMove = function(e) {

    if(this.isDrawing) {
        //récupération des coord du point d'arrivé de la souris
        var newLocation = this.getMouseLocation(e);

        var x2 = newLocation.X;
        var y2 = newLocation.Y;

        this.context.lineTo(x2, y2);

        //Applique les changements dans le canvas
        this.context.stroke();
    }
};