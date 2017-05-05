var vm = new Vue ({
    el: '#tuto',
    data:{
        personnes: [
            {nom: "Claret", prenom: "Marcel"},
            {nom: "Dupont", prenom: "Albert"},
            {nom: "Durand", prenom: "Jacques"},
            {nom: "Martin", prenom: "Denis"},
            {nom: "Torlet", prenom: "Arthur"}
        ],
        poubelle: [],
        inputNom: '',
        inputPrenom: ''
    },
    methods: {
        supprimer: function(index){
            this.poubelle.push(this.personnes[index]);
            this.personnes.splice(index, 1);
            this.poubelle.sort(ordonner);
        },
        retablir: function(index){
            this.personnes.push(this.poubelle[index]);
            this.poubelle.splice(index, 1);
            this.personnes.sort(ordonner);
        },
        modifier: function(index){
            this.inputNom = this.personnes[index].nom;
            this.inputPrenom = this.personnes[index].prenom;
            this.personnes.splice(index, 1);
            this.$refs.modif.focus();
        },
        ajouter: function(){
          this.personnes.push({nom: this.inputNom, prenom: this.inputPrenom});
          this.inputNom = this.inputPrenom = '';
          this.personnes.sort(ordonner);
        },
        toutPoubelle: function(){
            this.poubelle = this.personnes.concat(this.poubelle);
            this.personnes = [];
            this.poubelle.sort(ordonner);
        },
        toutRetablir: function(){
            this.personnes = this.personnes.concat(this.poubelle);
            this.poubelle = [];
            this.personnes.sort(ordonner);
        },
        eliminer: function(index){
            this.poubelle.splice(index, 1);
        },
        toutEliminer: function(){
            this.poubelle = [];
        }
    }
});

var ordonner = function(a, b){
    return a.nom.toUpperCase() > b.nom.toUpperCase();
};