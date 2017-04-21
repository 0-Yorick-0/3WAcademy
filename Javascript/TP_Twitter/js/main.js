/**
 * Created by wan2-11 on 21/04/17.
 */
"use strict";
$(function(){
   console.log('jQuery is fuckin\' ready !');

   var form = $('form');
   var textarea = $('textarea');
   var charCounterArea = $('#charCounter');
   var thread = $('#thread');
   var lastPost;

   form.submit(function(e){
       e.preventDefault();
       thread.prepend('<div class="post"><img class="avatar" src="'
           + user.avatar +
           '"><div class="wrapper"><b>@'
           + user.name +
           '</b>:<p>{{ tweet }}</p></div>' +
           '<button class="delete btn btn-danger btn-xs">Supprimer X</button><hr></div>');
            lastPost = $('#thread .post:first-child').hide().slideDown('slow');
   });





});