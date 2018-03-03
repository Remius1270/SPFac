
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(function() {
   $(".btn-edit").click(function() {
       var id = $(this).attr('id');
       var name = $('#name_'+id).html();
       var title = $('#title_'+id).html();

       $('#editModal #first_name').val(name);
       $('#editModal #title').val(title);
       $('#editModal form').attr('action','editRdv/'+id);
   });
});
