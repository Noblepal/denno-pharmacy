<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
		function validate()
		{
				var sp = document.getElementById("txt1").value;
				var op = document.getElementById("txt2").value;
				var currencyFormat = /^\d+(\.\d{1,2})?$/;

	if( currencyFormat.test(sp) != true)
	{
		document.getElementById("error-sp").innerHTML="Currency must be correct format";

	return false;
} if (currencyFormat.test(op) != true) {
		document.getElementById("error-op").innerHTML="Currency must be correct format";
		return false;
}else {
	return true;
}



		}
</script>
<form action="saveproduct.php" method="post" onsubmit="return validate();">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Product</h4></center>
<div id="ac" >
<span>Brand Name</span><input type="text" style="width:200px; height:30px;" name="code" ><br>
<span>Generic Name</span><input type="text" style="width:200px; height:30px;" name="gen" Required/><br>
<span>Category / Description</span><textarea style="width:200px; height:50px;" name="name"> </textarea><br>
<span>Date Arrival</span><input type="date" style="width:200px; height:30px;" name="date_arrival" /><br>
<span>Expiry Date </span><input type="date" value="<?php echo date ('M-d-Y'); ?>" style="width:200px; height:30px;" name="exdate" /><br>
<span>Selling Price </span>
<input type="text" id="txt1" style="width:200px; height:30px;" name="price" onkeyup="sum();" Required><br>
<span id="error-sp"  style="width:200px; height:30px;color:red"></span><br>
<span>Original Price</span>
<input type="text" id="txt2" style="width:200px; height:30px;" name="o_price" onkeyup="sum();" Required><br>
<span id="error-op"  style="width:200px; height:30px;color:red"></span><br>
<span>Profit</span><input type="text" id="txt3" style="width:200px; height:30px;" name="profit" readonly><br>
<span>Supplier</span>
<select name="supplier"  style="width:200px; height:30px; margin-left:-5px;" >
<option></option>
	<?php
	include('../connect.php');
	$result = $link->prepare("SELECT * FROM supliers");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['suplier_name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>Quantity : </span><input type="number" style="width:200px; height:30px;" min="0" id="txt11" onkeyup="sum();" name="qty" Required ><br>
<span></span><input type="hidden" style="width:200px; height:30px;" id="txt22" name="qty_sold" Required ><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
