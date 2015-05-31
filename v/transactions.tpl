<section class="inner cover <?=$this->mainClass?>" data-transactions="<?=$this->mainClass?>" id="transactions">
  <h1 class="cover-heading">Мои <?=$this->title?>ы.</h1>
  <p class="add-new-transaction">
    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#transactionModal">
      <i class="glyphicon glyphicon-plus"></i> Новый <?=$this->title?>
    </button>
  </p>
  <div class="lists"> 
    <? if(empty((array)$this->records)): ?>
      Нет данных 
    <? endif; ?> 
    <? foreach($this->records as $date => $oneDateRecords): ?>               
      <div class="list-group">
        <span href="#" class="list-group-item active list-header">
          <h4 class="list-group-item-heading"><?=$date?></h4>        
        </span>
        <? foreach($oneDateRecords as $record): ?>      
          <span href="#" class="list-group-item">
            <h4 class="list-group-item-heading"><?=$record['category']?></h4>  
            <span class="badge"><?=$record['summ']?></span>
            <p class="list-group-item-text"><?=$record['comment']?></p>             
          </span>  
        <? endforeach; ?> 
      </div>
  	<? endforeach; ?> 
  </div>
  <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" id="exampleModalLabel">Новый <?=$this->title?></h3>
        </div>
        <div class="modal-body">
          <form method="post" action="/<?=$this->mainClass?>">
            <div class="form-group">
              <label for="category" class="control-label">Категория:</label>             
              <div class="input-group">                              
                <select class="form-control" id="category" name="category" required>
                  <? foreach($this->categories as $key => $category): ?>               
                    <option value="<?= $key ?>"><?= $category ?></option>
                	<? endforeach; ?>                                        
                </select> 
                <span class="input-group-btn">
                  <button type="button" id="newCategory"><i class="glyphicon glyphicon-plus"></i></button>
                </span>                 
              </div>
            </div>
            <div class="form-group">
              <label for="summ" class="control-label">Сумма:</label>
              <input type="text" class="form-control" id="summ" placeholder="0" name="summ" required>
            </div>
            <div class="form-group">
              <label for="date" class="control-label">Дата:</label>
              <input type="text" class="form-control datepicker" id="date" name="date" readonly>
            </div>
            <div class="form-group">
              <label for="comment" class="control-label">Коментарий:</label>
              <textarea class="form-control" id="comment" name="comment"></textarea>
            </div>
            <button type="submit" class="hide"></button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="newRecord">Добавить</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
        </div>
      </div>
    </div>
  </div>
</section>