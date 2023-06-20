$(window).on('load', function() {
  $('.table').DataTable();
  $('form select').select2({
    tags: true,
    theme: "bootstrap-5",
    placeholder: 'Select Option',
  });
});