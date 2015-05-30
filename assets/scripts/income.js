$('#category').prop('selectedIndex', -1);

$('#newCategory').click(function() {
  var category = $.trim(prompt('Введите наименование новой категории.'));  
  if (!category) return;
}); 

$('#summ').keypress(function(e){
  if ((e.keyCode !== 46 && (e.keyCode < 48 || e.keyCode > 57)) 
    || (e.keyCode === 46 && ~this.value.indexOf('.'))) {
    e.preventDefault(); 
  }
});

$('#date').datepicker({
  format: 'dd MM yyyy г.',
  language: 'ru',
  autoclose: true,
  todayHighlight: true    
})
.datepicker('update', new Date());