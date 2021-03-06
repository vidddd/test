<input type="hidden" id="active_page" value="<?php echo $page?>" />
<table id="data-table-basic" class="table table-striped">
    <thead>
        <tr>
            <th width="40%">EMAIL</th>
            <th width="40%">SITE</th>
            <th width="20%">ACTIONS</th>

        </tr>
    </thead>
    <tbody >
        <?php
        foreach ($newsletters as $newsletter) {
        ?>
        <tr>
            <td><?php echo $newsletter->email?></td>
            <td><?php echo $newsletter->name?></td>

            <td>
                <a href="<?php echo base_url('adm-gst/newsletter/'.$newsletter->id.'/delete');?>" class="delete-item">
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
                $to=$from+count($newsletters)-1;
            ?>
            <div class="infos">Mostrando <?php echo $from;?> a <?php echo $to;?> de <?php echo $items_totales?> filas</div>
        </div>
    </div>
</div>
<?php
}
?>