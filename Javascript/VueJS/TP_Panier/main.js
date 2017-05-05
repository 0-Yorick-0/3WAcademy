var vm = new Vue ({
    el: '#tuto',
    data:{
        panier: [
            {
                article: 'Cahier',
                quantite: 2,
                prix: '5.30'
            },
            {
                article: 'Crayon',
                quantite: 4,
                prix: '1.10'
            },
            {
                article: 'Gomme',
                quantite: 1,
                prix: '3.25'
            }
        ],
        input: {article: '', quantite: 0, prix: 0}
    },
    methods: {
        supprimer: function (index) {
            this.panier.splice(index, 1);
        },
        modifier: function(index){
            this.input.article = this.panier[index].article;
            this.input.quantite = this.panier[index].quantite;
            this.input.prix = this.panier[index].prix;
            this.panier.splice(index, 1);
            this.$refs.modif.focus();
        },
        ajouter: function(){
            this.panier.push({article: this.input.article, quantite: this.input.quantite, prix: this.input.prix});
            this.input = {}
        }
    },
    computed:{
        total : function(){
            var sum = 0;
            for(let item of this.panier){
                sum += parseInt(item.prix) * item.quantite;
            }
            return sum.toFixed(2);
        }
    }
});
