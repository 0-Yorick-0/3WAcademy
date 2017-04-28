/**
 * Created by wan2-11 on 21/04/17.
 */
"use strict";
$(function(){
   console.log('jQuery is fuckin\' ready !');

   var twitter = $('div#twitter');
   var inscription =$('div#inscription');
   var form = $('#twitterForm');
   var textarea = $('textarea#text');
   var charCounterArea = $('#charCounter');
   var thread = $('#thread');
   var users;

   //objet user qui servira à renseigner les ids de l'utilisateur
   var user = {
       avatar : "",
       name: ""
   };

   function findUser(name){
       //récupération des users présents dans le localstorage
       users = getUsers();
       //parcours du 
        for(let userObj of users){
            if(name == userObj.name){
                return userObj;
            }
        }
        return null;
   }

   function getUsers(){
       users = [];
       if(localStorage.getItem('Users') !== null){
           users = JSON.parse(localStorage.getItem('Users'));
       }
       return users;
   }

   function addUser(user){
       users = getUsers();
       if(!jQuery.isEmptyObject(user)){
           users.unshift(user);
           users = JSON.stringify(users);
           localStorage.setItem('Users', users);
       }
   }

   textarea.keyup(function(){
       var textLength = textarea.val().length;
       charCounterArea.text(textLength + "/150");
   });

    function getPosts(){
        var posts = [];
        //on récupère la chaîne de caractères "[obj3, obj2 ....]" associée à la clef 'postPublished' dans le localStorage
        var postsJson = localStorage.getItem('postsPublished');
        //si le localStorage n'est pas vide, on transforme le résultat en tableau d'objets représentant chaque posts
        if(postsJson !== null){
            posts = JSON.parse(postsJson);
        }
        return posts;
    }


    function addPost(postToSave){
        var posts = getPosts();
        //on ajoute au tableau d'objet le nouveau post après l'avoir transformé en objet JSON
        posts.unshift(postToSave);
        savePosts(posts);
    }

    function savePosts(posts){
        //le tableau d'objet mis à jour est à nouveau transformé en chaine de caractères puis envoyé au localStorage
        var postsToSave = JSON.stringify(posts);
        localStorage.setItem('postsPublished', postsToSave);
    }

    function refreshPosts(){
        var posts = getPosts();
        var postsList = "";
        for(let post of posts){
            postsList += postRender(post);
        }
        thread.html(postsList);
    }

    function postRender(post){
        return '<div class="post"><img class="avatar" src="'
            + post.avatar +
            '"><div class="wrapper"><b>@'
            + post.name +
            '</b>:<p> ' + post.text + '</p></div>' +
            '<button class="delete btn btn-danger btn-xs">Supprimer X</button><hr></div>'
    }

    function removePost(index){
        var posts = getPosts();
        posts.splice(index, 1);
        savePosts(posts);
    }

    $('form#inscriptionForm').submit(function(e){
        e.preventDefault();
        var name = $('form input#name').val();
        var avatar = $('form input#avatar').val();

        user.name = name;
        user.avatar = avatar;

        twitter.toggleClass('hidden');
        inscription.toggleClass('hidden');

        $('.close').click();

        addUser(user);
    });

    $('form#connexionForm').submit(function(e){
        e.preventDefault();
        var name = $('form input#nameConnexion').val();
        var userTemp = findUser(name);
        if(userTemp !== null){
            user = userTemp;
            twitter.toggleClass('hidden');
            inscription.toggleClass('hidden');
            $('.close').click();
        }
    });

    form.submit(function(e){
        e.preventDefault();
        var post = {
            name : user.name,
            avatar : user.avatar,
            text : textarea.val()
        }
        thread.prepend(postRender(post));
        $('#thread .post:first-child').hide().slideDown('slow');
        addPost(post);
        form.trigger('reset');
        charCounterArea.text("");

    });

    thread.on('click', '.delete', function(){
        $(this).parent().fadeTo("slow", 0).slideUp(function(){
            var index = $(this).index();
            removePost(index);
            $(this).remove();
        });

    });

    refreshPosts();
    
});