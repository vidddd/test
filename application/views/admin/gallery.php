 <input type="hidden" id="list" value="<?php echo $this->uri->segment(2)?>"/>

 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');
    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>GALLERY
                        <a href="<?php echo base_url('adm-gst/gallery/0')?>"><button class="btn bgm-cyan btn-icon waves-effect waves-circle waves-float pull-right"><i class="zmdi zmdi-plus"></i></button></a>
                    </h2>
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
                            <?php
                            if($this->uri->segment(2) == 'gallery'){
                            ?>
                            <div class="col-sm-3 actionBar">
                                <select class="chosen" data-placeholder="Choose a State..." id="chose_state" name="state">
                                    <option value=""></option>
                                    <option value="-1">Pending</option>
                                    <option value="1">Confirmed</option>
                                </select>

                            </div>
                            <?php
                            }
                            ?>
                            
                        </div>
                    </form>
                </div>
                <?php if(count($gallery)):?>
                <div class="table table-striped table-vmiddle bootgrid-table" id="ajax-rows">
                    <input type="hidden" id="active_page" value="<?php echo $page?>" />
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="15%">NAME</th>
                                <th width="10%">IMAGE</th>
                                <th width="35%">TEXT</th>
                                <th width="5%">LIKES</th>
                                <th width="15%">DATE</th>
                                <th width="10%">STATE</th>
                                <th width="10%">ACTIONS</th>

                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            foreach ($gallery as $item) {
                                ?>
                                <tr>
                                    <td><a href="<?php echo $item->link;?>" target="_blank" class="link_user"><img src="<?php echo $item->photo?>" width="25" height="25"  style="border-radius: 50%;" alt="">&nbsp;&nbsp;<?php echo $item->user?></a></td>
                                    <td><a href="<?php echo $item->image?>" target="_blank"><img src="<?php echo $item->image?>"  height="75"  alt=""></a></td>
                                    <td><?php echo (strlen($item->text) > 200)?substr($item->text,0,200)."...":$item->text;?></td>
                                    <td><?php echo $item->fav;?></td>
                                    <td><?php echo date2esp($item->created_at);?></td>
                                    <td><?php echo ($item->active == -1)?'Pending':'Confirmed';?></td>
                                    <td>
                                        <?php
                                        if($item->active != 1 && $this->uri->segment(2) != 'gallery_deleted'){
                                        ?>
                                            <a href="<?php echo base_url('adm-gst/gallery/'.$item->id.'/confirm');?>" class="confirm-item">
                                                <button type="button" class="btn btn-icon command-edit waves-effect waves-circle"><span class="zmdi zmdi-badge-check"></span></button>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if($this->uri->segment(2) == 'gallery'){
                                        ?>
                                        <a href="<?php echo base_url('adm-gst/gallery/'.$item->id.'/delete');?>" class="delete-item">
                                            <button type="button" class="btn btn-icon command-edit waves-effect waves-circle"><span class="zmdi zmdi-delete"></span></button>
                                        </a>
                                        <?php
                                        }else{
                                        ?>
                                        <a href="<?php echo base_url('adm-gst/gallery/'.$item->id.'/reactive');?>" class="reactive-item">
                                            <button type="button" class="btn btn-icon command-edit waves-effect waves-circle"><span class="zmdi zmdi-rotate-right"></span></button>
                                        </a>
                                        <?php
                                        }
                                        ?>
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
                                    $to=$from+count($gallery)-1;
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
                        <div class="alert alert-danger" role="alert">There are not rows...</div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </section>
</section>
