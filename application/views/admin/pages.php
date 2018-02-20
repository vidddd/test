 <input type="hidden" id="list" value="sites"/>

 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');
    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>SITES
                    <a href="<?php echo base_url('adm-gst/pages/0')?>"><button class="btn bgm-cyan btn-icon waves-effect waves-circle waves-float pull-right"><i class="zmdi zmdi-plus"></i></button></a>
                    </h2>
                </div>
                <div  class="bootgrid-header container-fluid">
                    <form action="#" method="post" id="filters">
                        <div class="row">
                            <div class="col-sm-4 actionBar">
                                <div class="m-b-15 fg-line with-button">
                                    <input type="text" class="form-control" name="search" placeholder="Search" value="" />
                                    <button class="btn btn-link bgm-amber waves-effect" id="go_filter"><i class="zmdi zmdi-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php if(count($sites)):?>
                <div class="table table-striped table-vmiddle bootgrid-table" id="ajax-rows">
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
                        <tbody >
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
                                    <li class="first disabled" >
                                        <a data-page="1" class="button paginate"><i class="zmdi zmdi-more-horiz"></i></a>
                                    </li>
                                    <li class="prev disabled" >
                                        <a data-page="prev" class="button paginate"><i class="zmdi zmdi-chevron-left"></i></a>
                                    </li>
                                    <?php
                                    for($i=1;$i<=$total;$i++){
                                    ?>
                                    <li class="page-<?php echo $i;?> <?php echo ($page==$i)?'active':'';?>" >
                                        <a data-page="<?php echo $i;?>" class="button paginate"><?php echo $i;?></a>
                                    </li>
                                    <?php
                                    }
                                    ?>

                                    <li class="next" >
                                        <a data-page="2" class="button paginate"><i class="zmdi zmdi-chevron-right"></i></a>
                                    </li>
                                    <li class="last" >
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
                </div>
                <?php else:?>
                    <div class="card-body card-padding m-t-30 m-b-30">
                        <div class="alert alert-danger" role="alert">There are not pages...</div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </section>
</section>
