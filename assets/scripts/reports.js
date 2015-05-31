var $reportrangeEl = $('#reportrange span');
var $activeHeader = $('.list-group-item.active h4');
var DATE_FORMAT = 'DD.MM.YYYY';
var SEPARATOR = ' - ';
var defaultRange = moment().subtract(29, 'days').format(DATE_FORMAT) + SEPARATOR + moment().format(DATE_FORMAT);

changeRange(defaultRange);

$('#reportrange').daterangepicker({
    format: DATE_FORMAT,
    startDate: moment().subtract(29, 'days'),
    endDate: moment(),  
    maxDate: moment(),
    dateLimit: { days: 60 },
    showDropdowns: true,
    showWeekNumbers: true,
    timePicker: false,
    timePickerIncrement: 1,
    timePicker12Hour: true,
    ranges: {
       'Сегодня': [moment(), moment()],
       'Вчера': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Последние 7 дней': [moment().subtract(6, 'days'), moment()],
       'Последние 30 дней': [moment().subtract(29, 'days'), moment()],
       'Этот месяц': [moment().startOf('month'), moment().endOf('month')],
       'Последний месяц': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    opens: 'left',
    drops: 'down',
    buttonClasses: ['btn', 'btn-sm'],
    applyClass: 'btn-primary',
    cancelClass: 'btn-default',
    separator: SEPARATOR,
    locale: {
        applyLabel: 'Применить',
        cancelLabel: 'Отмена',
        fromLabel: 'С',
        toLabel: 'По',
        customRangeLabel: 'Выбрать',
        daysOfWeek: ['Вск', 'Пн', 'Вт', 'Ср', 'Чт', 'Птн','Сб'],
        monthNames: ['Январь', 'Феврать', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        firstDay: 1
    }
}, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
    changeRange(start.format(DATE_FORMAT) + SEPARATOR + end.format(DATE_FORMAT));
});

function changeRange(range) {
  var dates = range.split(SEPARATOR);
  $.post('/ajax/balance', {
    startDate: dates[0],
    endDate: dates[1]
  }, function (data) {
    try {data = JSON.parse(data);} catch(e) {}
    if (data.type == 'error') {
      return console.error('(POST /ajax/balance)', data.message);
    }
    
    var percent; 
    var $pIncome = $('#progressIncome');
    var $pCost = $('#progressCost');
    var $iIncome = $('#infoIncome');
    var $iCost = $('#infoCost');

    if (data.income >= data.cost) {
      percent = Math.round(data.cost/data.income*100);      
      $pIncome.css('width', '100%');
      $iIncome.html("Доход: " + data.incomeSummStyle);
      $pCost.css('width', percent + '%');
      $iCost.html("Расход: " + data.costSummStyle);    
    } else {
      percent = Math.round(data.income/data.cost*100); 
      $pCost.css('width', '100%');
      $iCost.html("Расход: " + data.costSummStyle);
      $pIncome.css('width', percent + '%');
      $iIncome.html("Доход: " + data.incomeSummStyle); 
    } 
    
    if (!isFinite(percent)) {
      $pCost.width(0);    
      $pIncome.width(0);  
    }     
  });
  $reportrangeEl.html(range);
  $activeHeader.html(range);  
}