 <input type="hidden" id="list" value="winners_fb"/>

 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');
    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>WINNERS</h2>
                </div>
                <div  class="bootgrid-header container-fluid">
                    <form action="#" method="post" id="filters">
                        <div class="col-sm-3 actionBar">
                            <select class="chosen" data-placeholder="Choose a Week..." id="chose_week" name="week">
                                <?php
                                foreach ($weeks as $week) {
                                ?>
                                <option value="<?php echo $week->week;?>" <?php echo ($week->week == $current_week)?'selected':'';?> >Week <?php echo $week->week;?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
                <?php if(count($winners)):?>
                <div class="table table-striped table-vmiddle bootgrid-table" id="ajax-rows">
                    <input type="hidden" id="active_page" value="<?php echo $page?>" />
                    <input type="hidden" value="<?php echo $total_winners;?>" id="total_winners" >
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="15%">NAME</th>
                                <th width="10%">IMAGE</th>
                                <th width="35%">TEXT</th>
                                <th width="5%">LIKES</th>
                                <th width="15%">DATE</th>
                                <th width="10%">WEEK</th>
                                <th width="10%">WINNER</th>

                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            foreach ($winners as $item) {
                                ?>
                                <tr <?php echo ($item->winner == 1)?'class="tr_winner"':'';?>>
                                    <td><a href="<?php echo $item->link;?>" target="_blank" class="link_user"><img src="<?php echo $item->photo?>" width="25" height="25"  style="border-radius: 50%;" alt="">&nbsp;&nbsp;<?php echo $item->user?></a></td>
                                    <td><a href="<?php echo $item->image?>" target="_blank"><img src="<?php echo $item->image?>"  height="75"  alt=""></a></td>
                                    <td><?php echo (strlen($item->text) > 200)?substr($item->text,0,200)."...":$item->text;?></td>
                                    <td><?php echo $item->fav;?></td>
                                    <td><?php echo date2esp($item->created_at);?></td>
                                    <td><?php echo $item->week;?></td>
                                    <td>
                                        <div class="checkbox m-b-15">
                                            <label>
                                                <input type="checkbox" value="1" name="winner" class="check_winner" <?php echo ($item->winner == 1)?'checked':'';?> data-id="<?php echo $item->id?>">
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
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
                                    $to=$from+count($winners)-1;
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
                        <div class="alert alert-danger" role="alert">There are not winners...</div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </section>
</section>
