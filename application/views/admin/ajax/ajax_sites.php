<input type="hidden" id="active_page" value="<?php echo $page?>" />
<table id="data-table-basic" class="table table-striped">
    <thead>
        <tr>
            <th width="10%">FLAG</th>
            <th width="15%">NAME</th>
            <th width="10%">SHORT NAME</th>
            <th width="45%">URL</th>
            <th width="20%">ACTIONS</th>

        </tr>
    </thead>
    <tbody id="ajax-rows">
        <?php
        foreach ($sites as $site) {
        ?>
        <tr>
            <td><img src="<?php echo base_url('uploads/flags/'.$site->flag);?>" height="10" alt=""></td>
            <td><?php echo $site->name?></td>
            <td><?php echo $site->short?></td>
            <td><?php echo $site->url?></td>
            <td>
                <a href="<?php echo base_url('adm-gst/pages/'.$site->id);?>">
                    <button type="button" class="btn btn-icon command-edit waves-effect waves-circle"><span class="zmdi zmdi-edit"></span></button>
                </a>
                <a href="<?php echo base_url('adm-gst/pages/'.$site->id.'/delete');?>" class="delete-item">
                    <button type="button" class="btn btn-icon command-edit waves-effect waves-circle"><span class="zmdi zmdi-delete"></span></button>
                </a>
            </td>
        </tr>
        <?php
        }
        ?>

    </tbody>
</table>
<?php
if($total > 1){
?>
<div class="bootgrid-footer container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <ul class="pagination">
                <li class="first <?php echo ($page==1)?'disabled':'';?>" >
                    <a data-page="1" class="button paginate"><i class="zmdi zmdi-more-horiz"></i></a>
                </li>
                <li class="prev <?php echo ($page==1)?'disabled':'';?>" >
                    <a data-page="<?php echo $page-1;?>" class="button paginate"><i class="zmdi zmdi-chevron-left"></i></a>
                </li>
                <?php
                $paginas=ceil($items_totales/$per_page);
                for($i=1;$i<=$paginas;$i++){
                ?>
                    <li class="page-<?php echo $i;?> <?php echo ($page==$i)?'active':'';?>" >
                        <a data-page="<?php echo $i;?>" class="button paginate"><?php echo $i;?></a>
                    </li>
                <?php
                }
                ?>

                <li class="next <?php echo ($page==$total)?'disabled':'';?>" >
                    <a data-page="<?php echo $page+1;?>" class="button paginate"><i class="zmdi zmdi-chevron-right"></i></a>
                </li>
                <li class="last <?php echo ($page==$total)?'disabled':'';?>" >
                    <a data-page="<?php echo $total;?>" class="button paginate"><i class="zmdi zmdi-more-horiz"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-sm-6 infoBar">
            <?php
                $from=($page-1)*$per_page+1;
                $to=$from+count($sites)-1;
            ?>
            <div class="infos">Mostrando <?php echo $from;?> a <?php echo $to;?> de <?php echo $items_totales?> filas</div>
        </div>
    </div>
</div>
<?php
}
?>