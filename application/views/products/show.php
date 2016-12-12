<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
<div class="panel-heading">
    <h3 class="panel-title">Szczegóły produktu</h3>
</div>
    <table class="table table-responsive products">
        <tbody>
            <tr>
                <td class="middle"><img id="myImg" src="uploads/<?php echo $product->image;?>" alt="<?php echo $product->name;?>" /></td>
                <td><h4><?php echo $product->name;?></h4></td>
                <td class="middle"><h6><?php echo NUM::round_up($product->netto_price+($product->netto_price*$product->tax->rate/100), 3);?>PLN <small>Brutto</small></h6>
                    <h6><?php echo $product->netto_price;?>PLN <small>Netto</small></h6>
                    </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    
                    <form method="post" class="form-inline">
                        <div class="form-group">
                            <label for="quantity">Ilość: </label>
                            <input type="number" name="quantity" id="quantity" value="1" class="form-control" />
                            <input type="submit" value="dodaj do koszyka" class="btn btn-success" /> 
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="3"><?php echo nl2br($product->description);?></td>
            </tr>
        </tbody>
    </table>

<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="closex" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closex")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>