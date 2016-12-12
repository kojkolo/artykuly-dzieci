<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="panel-heading">
    <h3 class="panel-title">Finalizacja zamównienia</h3>
</div>
<div class="panel-body">
    <h4>Podaj adres dostawy towarów:</h4>
</div>
<div class="container-fluid">
    <form class="form-horizontal" method="post">
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Imię*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" id="name" placeholder="Imię">
        </div>
      </div>
      <div class="form-group">
        <label for="surname" class="col-sm-2 control-label">Nazwisko*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="surname" id="surname" placeholder="Nazwisko">
        </div>
      </div>
      <div class="form-group">
        <label for="company_name" class="col-sm-2 control-label">Nazwa firmy</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Nazwa firmy">
        </div>
      </div>
      <div class="form-group">
        <label for="street_number" class="col-sm-2 control-label">Ulica*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="street_number" id="street_number" placeholder="Ulica 12/33">
        </div>
      </div>
        <div class="form-group">
        <label for="street_number" class="col-sm-2 control-label">Kod pocztowy*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="street_number" id="street_number" placeholder="12-345">
        </div>
      </div>
        <div class="form-group">
        <label for="city" class="col-sm-2 control-label">Miejscowość*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="city" id="city" placeholder="Miejscowość">
        </div>
      </div>
        <div class="form-group">
        <label for="phone_number" class="col-sm-2 control-label">Telefon*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="123-456-789">
        </div>
      </div>
    <div class="row panel-body">
        <h4>Wybierz metodę dostawy:</h4>
        <select name ="deliverymethods" class="form-control">
            <?php foreach($deliverymethods as $c){
            ?>
            <option value ="<?php echo $c -> id;?>" ><?php echo $c -> name;?> (<?php echo $c -> cost;?>PLN)</option>
            <?php } ?>
        </select>
    </div>
    <div class="row panel-body">
        <h4>Wybierz metodę dostawy:</h4>
        <select name ="paymentmethods" class="form-control">
            <?php foreach($paymentmethods as $c){
            ?>
            <option value ="<?php echo $c -> id;?>" ><?php echo $c -> name;?></option>
            <?php } ?>
        </select>
    </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Potwierdź zamówienie</button>
        </div>
      </div>
    </form>
</div>