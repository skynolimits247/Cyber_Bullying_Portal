<?php
require_once('header.php');
$sql = "SELECT sum(rating_number) as avgrate, COUNT( rating_number ) as totalratings ,rating_number FROM ratings WHERE pcode = 1234 LIMIT 1";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$ratings = $row;
if($ratings['totalratings'] != 0)
{
  $avgrate = round($ratings['avgrate']/$ratings['totalratings']);
}
else
{
  $avgrate = round($ratings['avgrate']/1);
}
?>
<link href="css/ratings.css" rel="stylesheet" />

<div class="product-rating clearfix">
    <div class="rating">
        <?php $restrate = 5 - $avgrate;
        for ($x = 1; $x <= $restrate; $x++) { ?>
            <span class="star"></span>
        <?php
        }
        ?>
        <?php
        for ($y = 1; $y <= $avgrate; $y++) { ?>
            <span class="star active"></span>
        <?php
        }
        ?>
    </div>

</div>

<h3>Rate this Product</h3>
<input name="rating" value="0" id="rating_star" type="hidden" prodid="1234" />

<div class="rating">
    <span class="star"></span>
    <span class="star active"></span>
    <span class="star active"></span>
    <span class="star active"></span>
    <span class="star active"></span>
</div>

<br><br><br>
<?php
require_once('footer.php');
?>
<script src="js/ratings.js"></script>
<script>
    $(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '<?php $avgrate ?>',
        callbackFunctionName: 'processRating',
        imageDirectory: 'assets/images/',
        inputAttr: 'prodid'
    });
});

function processRating(val, attrVal){

    $.ajax({
        type    : 'POST',
        url     : 'addratings.php',
        data : {pcode: attrVal,ratingpoints: val  },
        success: function(result){
            console.log(result);
        }
    });
}
</script>
