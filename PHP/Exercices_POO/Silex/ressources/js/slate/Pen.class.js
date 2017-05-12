function Pen(canvasContext){

    this.context = canvasContext;
    this.setColor("#000");
    this.setSize(1);
}

Pen.prototype.setColor = function(color){
    this.context.strokeStyle = color;
};

Pen.prototype.setSize = function(size){
    this.context.lineWidth = size;
};