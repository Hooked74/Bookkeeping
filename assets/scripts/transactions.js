var $category = $('#category');

$category.prop('selectedIndex', -1);

$('#newCategory').click(function() {
  var category = $.trim(prompt('Введите наименование новой категории.'));  
  if (!category) return;
  $.post('/ajax/newcategory', {
    category: category,
    transaction: $('#transactions').data('transactions'),
    index: $category.children().length  
  }, function(data) {
    try {data = JSON.parse(data);} catch(e) {}
    if (data.type == 'error') {
      return console.error('(POST /ajax/newcategory)', data.message);
    }    
    $('<option />', {
      value: data.id,
      html: data.category
    }).appendTo($category);
    $category.prop('selectedIndex', -1);
  });
}); 

$('#summ').keypress(function(e){
  if ((e.keyCode !== 46 && (e.keyCode < 48 || e.keyCode > 57)) 
    || (e.keyCode === 46 && ~this.value.indexOf('.'))) {
    e.preventDefault(); 
  }
});

$('#date').datepicker({
  format: 'dd.mm.yyyy',
  language: 'ru',
  autoclose: true,
  todayHighlight: true    
})
.datepicker('update', new Date());

$('#newRecord').click(function(){
  $('#transactionModal form button[type=submit]').click();
});