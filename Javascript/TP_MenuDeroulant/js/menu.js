/**
 * Created by wan2-11 on 19/04/17.
 */
"use strict";
$(function(){

    console.log('jQuery is fuckin\' ready !');

    var mainCategories = $('#categories li>span');

    mainCategories.append('[+]');

    mainCategories.click(function(){
        $(this).next().toggle();

        var textMain = $(this).text();

        if($(this).next().is(':visible')){
            $(this).text(textMain.replace("+", "-"));
        }else{
            $(this).text(textMain.replace("-", "+"));
        }
    });

});