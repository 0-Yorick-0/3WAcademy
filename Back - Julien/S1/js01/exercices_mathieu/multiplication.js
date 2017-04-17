'use strict';

var tableMulti = 
{

	table: [],

	run: function()
	{
		this.construireTable();
		this.construireTableau();
	},

	insererElement: function(Elt, text, parent){
		var pseudoElt = document.createElement(Elt);
		pseudoElt.textContent = text;
		if (typeof parent === 'string') {
			var parentElt = document.querySelector(parent);
			parentElt.appendChild(pseudoElt);
			
		}else{
			parent.appendChild(pseudoElt);		
		}		
	},

	colorCell: function (){
		var trElt = document.querySelector("tr:last-child td:last-child");
		trElt.classList.add("equal");
	},

	construireTable: function ()
	{
		for (var i = 0; i <= 10; i++)
		{
			for (var j = 0; j <=10; j++)
			{
				this.table.push(j + " x " + i + " = " + j*i);
			}
		}
	},

	construireTableau: function()
	{
		this.insererElement("table", '', "body");
		var indice = 0;
		for (var i = 0; i <= 10; i++)
		{
			this.insererElement("tr", '', "table");
			var tr = document.getElementsByTagName("tr")[i];
			
			for (var j = 0; j <= 10; j++)
			{
				this.insererElement("td", this.table[indice], tr);
				if (j == i) {
					this.colorCell();
				}
				indice++;
			}	
		}
		
	},
};

tableMulti.run();