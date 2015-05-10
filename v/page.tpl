<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Бухгалтерия</title>

  <meta name="description" content="Домашняя бухгалтерия">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="robots" content="index, follow" />
  <meta name="revisit" content="7" />
  <meta name="document-state" content="dynamic" />
  <meta http-equiv="content-language" content="ru" />
  <meta name="title" content="Bookkeeping" />
  <meta name="keywords" content="бухгалтерия, домашняя бухгалтерия, доходы, расходы" />
  <meta name="copyright" content="Some Inc." />
  
  <? foreach($this->styles as $style): ?>
		<link href="/assets/css/<?= $style ?>" rel="stylesheet" />
	<? endforeach; ?>

	<? foreach($this->vendors as $vendor): ?>
		<script src="/assets/vendors/<?= $vendor ?>"></script>
	<? endforeach; ?>

</head>

<body>   
  <main class="site-wrapper">
    <div class="site-wrapper-inner">
      <div class="cover-container">
            
        <?= $this->content ?>
  
        <footer class="mastfoot">
          <div class="inner">
            <p>© Company 2015.</p>
          </div>
        </footer>
  
      </div>
  
    </div>
  </main>
  
  <? if ($this->mainScript): ?>
  <script src="/assets/scripts/<?= $this->mainScript ?>"></script>
  <? endif; ?>
</body>
</html>



