 <input type="hidden" id="list" value="newsletters"/>

 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');
    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>SUBSCRIBERS</h2>
                </div>
                <div  class="bootgrid-header container-fluid">
                    <form action="#" method="post" id="filters">
                        <div class="row">
                            <div class="col-sm-3 actionBar">
                                <div class="m-b-15 fg-line with-button">
                                    <input type="text" class="form-control" name="search" placeholder="Search" value="" />
                                    <button class="btn btn-link bgm-amber waves-effect" id="go_filter"><i class="zmdi zmdi-search"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-3 actionBar">
                                <select class="chosen" data-placeholder="Choose a Site..." id="chose_select" name="site">
                                    <option value=""></option>
                                    <?php
                                    foreach ($sites as $site) {
                                    ?>
                                    <option value="<?php echo $site->id;?>"><?php echo $site->name;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </form>
                    <a title="Download" href="<?php echo base_url('adm-gst/csv-newsletters')?>" class="right-icon btn bgm-teal btn-icon waves-effect waves-circle waves-float pull-right"><i class="zmdi zmdi-download"></i></a>
                </div>
                <?php if(count($newsletters)):?>
                <div class="table table-striped table-vmiddle bootgrid-table" id="ajax-rows">
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
                                    $to=$from+count($newsletters)-1;
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
                        <div class="alert alert-danger" role="alert">There are not subscribers...</div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </section>
</section>
