 <input type="hidden" id="list" value="feeds"/>

 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');
    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Facebook CR7
                        <a href="<?php echo base_url('adm-gst/feeds/0')?>"><button class="btn bgm-cyan btn-icon waves-effect waves-circle waves-float pull-right"><i class="zmdi zmdi-plus"></i></button></a>
                    </h2>
                </div>
                <?php if(count($feeds)):?>
                <div class="table table-striped table-vmiddle bootgrid-table" id="ajax-rows">
                    <input type="hidden" id="active_page" value="1" />
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="80%">NAME</th>
                                <th width="20%">ACTIONS</th>

                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            foreach ($feeds as $feed) {
                            ?>
                            <tr>
                                <td><?php echo $feed->name?></td>
                                <td>
                                    <a href="<?php echo base_url('adm-gst/feeds/'.$feed->id);?>">
                                        <button type="button" class="btn btn-icon command-edit waves-effect waves-circle"><span class="zmdi zmdi-edit"></span></button>
                                    </a>
                                    <a href="<?php echo base_url('adm-gst/feeds/'.$feed->id.'/delete');?>" class="delete-item">
                                        <button type="button" class="btn btn-icon command-edit waves-effect waves-circle"><span class="zmdi zmdi-delete"></span></button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    
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
