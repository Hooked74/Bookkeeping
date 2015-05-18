<section class="inner cover <?=$this->mainClass?>">
  <h1 class="cover-heading">Мои <?=$this->title?>ы.</h1>
  <p class="add-new-transaction">
    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#transactionModal">
      <i class="glyphicon glyphicon-plus"></i> Новый <?=$this->title?>
    </button>
  </p>
  <div class="lists">
    <div class="list-group">
      <span href="#" class="list-group-item active list-header">
        <h4 class="list-group-item-heading">27 декабря 2015 г.</h4>        
      </span>
      <span href="#" class="list-group-item">
        <h4 class="list-group-item-heading">Работа</h4>  
        <span class="badge">+1000</span>
      <p class="list-group-item-text">основной</p>
      </span>
      <span href="#" class="list-group-item">
        <h4 class="list-group-item-heading">Работа</h4>  
        <span class="badge">+1000</span>
      <p class="list-group-item-text">основной</p>
      </span>
      <span href="#" class="list-group-item">
        <h4 class="list-group-item-heading">Работа</h4> 
        <span class="badge">+1000</span>
      <p class="list-group-item-text">основной</p>
      </span>
    </div>
    <div class="list-group">
      <span href="#" class="list-group-item active list-header">
        <h4 class="list-group-item-heading">25 декабря 2015 г.</h4>        
      </span>
      <span href="#" class="list-group-item">        
        <h4 class="list-group-item-heading">Работа</h4> 
        <span class="badge">+1000</span>
      <p class="list-group-item-text">основной</p>
      </span>
      <span href="#" class="list-group-item">         
        <h4 class="list-group-item-heading">Работа</h4>  
        <span class="badge">+1000</span>
      <p class="list-group-item-text">основной</p>
      </span>
      <span href="#" class="list-group-item">        
        <h4 class="list-group-item-heading">Подработка</h4> 
        <span class="badge">+1000</span>
      <p class="list-group-item-text">грузил мешки с песком</p>
      </span>
    </div>
    <div class="list-group">
      <span href="#" class="list-group-item active list-header">
        <h4 class="list-group-item-heading">20 декабря 2015 г.</h4>        
      </span>
      <span href="#" class="list-group-item">        
        <h4 class="list-group-item-heading">Работа</h4> 
        <span class="badge">+1000</span>
      <p class="list-group-item-text">основной</p>
      </span>
      <span href="#" class="list-group-item">         
        <h4 class="list-group-item-heading">Работа</h4>  
        <span class="badge">+1000</span>
      <p class="list-group-item-text">основной</p>
      </span>
      <span href="#" class="list-group-item">        
        <h4 class="list-group-item-heading">Подработка</h4> 
        <span class="badge">+1000</span>
      <p class="list-group-item-text">грузил мешки с песком</p>
      </span>
    </div>
    <div class="list-group">
      <span href="#" class="list-group-item active list-header">
        <h4 class="list-group-item-heading">13 декабря 2015 г.</h4>        
      </span>
      <span href="#" class="list-group-item">        
        <h4 class="list-group-item-heading">Работа</h4> 
        <span class="badge">+1000</span>
      <p class="list-group-item-text">основной</p>
      </span>
      <span href="#" class="list-group-item">         
        <h4 class="list-group-item-heading">Работа</h4>  
        <span class="badge">+1000</span>
      <p class="list-group-item-text">основной</p>
      </span>
      <span href="#" class="list-group-item">        
        <h4 class="list-group-item-heading">Подработка</h4> 
        <span class="badge">+1000</span>
      <p class="list-group-item-text">грузил мешки с песком</p>
      </span>
    </div>
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
          <form method="post" required>
            <div class="form-group">
              <label for="category" class="control-label">Категория:</label>             
              <div class="input-group">                              
                <select class="form-control" id="category">
                  <option value="1">Работа</option>
                  <option value="2">Подработка</option>
                  <option value="3">Грабеж</option>
                  <option value="4">Барыга</option>             
                </select> 
                <span class="input-group-btn">
                  <button type="button" id="newCategory"><i class="glyphicon glyphicon-plus"></i></button>
                </span>                 
              </div>
            </div>
            <div class="form-group">
              <label for="summ" class="control-label">Сумма:</label>
              <input type="text" class="form-control" id="summ" placeholder="0">
            </div>
            <div class="form-group">
              <label for="date" class="control-label">Дата:</label>
              <input type="text" class="form-control datepicker" id="date" readonly>
            </div>
            <div class="form-group">
              <label for="comment" class="control-label">Коментарий:</label>
              <textarea class="form-control" id="comment"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success">Добавить</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
        </div>
      </div>
    </div>
  </div>
</section>