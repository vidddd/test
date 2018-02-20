 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');
    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>
                    Users <small>(<?php echo count($users);?>)</small>
                    <a href="<?php echo base_url('adm-gst/users/0')?>" class="btn btn-icon btn-primary pull-right waves-effect waves-circle" title="Add User"><span class="zmdi zmdi-plus"></span></a>
                    </h2>
                </div>

                <div class="table table-striped table-vmiddle bootgrid-table">
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Country</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($users as $user) {
                            ?>
                            <tr>
                                <td><?php echo $user->email;?></td>
                                <td><?php echo ($user->rol == 1) ? 'Administrador':'Editor';?></td>
                                <td><?php echo $user->country;?></td>
                                <td>
                                    <a href="<?php echo base_url('adm-gst/users/'.$user->id)?>" class="btn btn-icon command-edit waves-effect waves-circle"><span class="zmdi zmdi-edit"></span></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
