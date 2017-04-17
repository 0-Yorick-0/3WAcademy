$(function(){
  console.log('jQuery is funckin\' ready !');

  // // $('button').click(function(){
  // //   $.post('backup.php',
  // //     {
  // //       prenom : 'Chuck',
  // //       nom : 'Norris',
  // //       age : 'Immortel',
  // //       ville : 'Texas'
  // //     },
  // //     function(data){
  // //       alert(data);
  // //       $('div').html(data);
  // //     }
  // //   );
  //
  // });

    $('button').click(function(){
      $('div').load('backup.php', {
        prenom : 'Chuck',
        nom : 'Norris',
        age : 'Immortel',
        ville : 'Texas'
      });
    });




});
