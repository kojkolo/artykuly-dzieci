<?php defined('SYSPATH') or die('No direct script access.');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="<?php echo $description; ?>">
    <title><?php echo $title; ?></title>
    <!--<base href="http://artykuly-dzieci.rf.gd">-->
    <base href="<?php echo URL::base(true); ?>">
    <?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), PHP_EOL ?>
<?php foreach ($scripts as $file) echo HTML::script($file), PHP_EOL ?>
  </head>
  <body>
      <div class="container">
          
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ArtykułyDzieci</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="navbar-form navbar-right">
          <?php if(Auth::instance()->logged_in('admin')){ ?>
          <a href="administration/dashboard" type="submit" class="btn btn-info">Panel administracyjny</a>
          
          <?php }?>
          <?php if(Auth::instance()->logged_in()){ ?>
          <a href="shopcart" type="submit" class="btn btn-primary">Koszyk</a>
          <a href="auth/logout" type="submit" class="btn btn-default">Wyloguj się</a>
          <?php } else { ?>
        <a href="auth/login" type="submit" class="btn btn-success">Zaloguj się</a>
        <a href="auth/register" type="submit" class="btn btn-warning">Rejestracja</a>
          <?php } ?>
      </div>    
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

          <div class="row">
        <div class="col-sm-3 col-md-3">
          <?php 
        function subcates($sc){
            echo '<ul class="list-group">';
                        foreach($sc as $subcategory){?>

            <li class="list-group-item"><span class="glyphicon glyphicon-menu-right">
                  </span><a href="<?php echo URL::site('products/'.URL::title(UTF8::transliterate_to_ascii($subcategory->name)).'/'.$subcategory->id); ?>"><?php echo $subcategory->name;?></a>
                            
                        <?php if(count($subcategory->childs->find_all()))subcates($subcategory->childs->find_all());
                        }
                        echo '</li></ul>';
                    }
                    
                    
        foreach($categories as $category){?>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <span class="glyphicon glyphicon-folder-open">
                  </span><a href="<?php echo URL::site('products/'.URL::title(UTF8::transliterate_to_ascii($category->name)).'/'.$category->id); ?>"><?php echo $category->name;?></a>
                </h4>
              </div>
              <div class="panel-collapse collapse in">
                    <?php 
                        if(count($category->childs->find_all())){subcates($category->childs->find_all());}
                    ?>
              </div>
            </div>
          </div>
        <?php } ?>
            
            
        </div>
        <div class="col-sm-9 col-md-9">
<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>

          <div class="panel panel-default">
              <?php echo $content; ?>
          </div>
        </div>
      </div>



    
      </div>
  </body>
</html>
