/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 


    $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    });
   
$(function () {
            $('#mecanismo').complexify({}, function (valid, complexity) {
                document.getElementById("mtSenha").value = complexity;
            });
        });
