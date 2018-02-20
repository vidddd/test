<p class="c-black f-500 m-b-5 m-t-20">Módulos</p>
<br>
<div class="row">
	<div class="col-sm-12">
		<div class="table table-striped table-vmiddle bootgrid-table">
			<table id="data-table-modules" class="table table-striped" >
		        <tbody>
		        	<?php
		        	$order_modules="";
		        	foreach ($modules as $module) {
		        	?>
			        	<tr <?php echo ($module->id == 1)?'class="disable-sort-item"':'';?> data-id="<?php echo $module->id;?>">
			                <td>
			                	<?php echo $module->name;?>
			                	<a href="#modalModule-<?php echo $module->id;?>" data-toggle="modal" class="btn btn-info waves-effect pull-right"><i class="zmdi zmdi-edit"></i></a>
			                </td>
			            </tr>
		        	<?php
		        		$order_modules.=$module->id."-";
		        	}
		        	?>
		        </tbody>
		    </table>	
		    <input type="hidden" id="order_modules" name="order_modules" value="<?php echo $order_modules;?>" />
		</div>
	</div>
</div>