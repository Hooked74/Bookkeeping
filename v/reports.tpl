<nav class="masthead clearfix">
  <div class="inner">
    <h3 class="masthead-brand"><a href="/">Домашняя бухгалтерия</a></h3>
    <ul class="nav masthead-nav">
      <li><a href="/income">Доходы</a></li>
      <li><a href="/cost">Расходы</a></li>
      <li class="active"><a href="/reports">Отчеты</a></li>
    </ul>
  </div>
</nav>

<section class="inner cover" id="reports">
  <h1 class="cover-heading">Баланс</h1>
  <div id="reportrange" class="pull-right">
    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
    <span></span> <b class="caret"></b>
  </div><br /><br />
  <div class="lists">           
    <div class="list-group">
      <span href="#" class="list-group-item active list-header">
        <h4 class="list-group-item-heading"></h4>        
      </span>  
      <span href="#" class="list-group-item">
        <span id="infoIncome">Доход: 0,00</span>
        <div class="progress">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" id="progressIncome"></div>
        </div> 
        <span id="infoCost">Расход: 0,00</span>
        <div class="progress">
          <div class="progress-bar progress-bar-danger" role="progressbar"  aria-valuemin="0" aria-valuemax="100" id="progressCost"></div>
        </div>            
      </span>     
    </div>
  </div>
</section>