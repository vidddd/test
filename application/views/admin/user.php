 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');

    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <?php echo form_open('adm-gst/users/'.$this->uri->segment(3).'/save','id="form-page"');?>
                    <div class="card-header">
                        <h2>
                        Edit User
                        <a href="<?php echo base_url('adm-gst/users')?>" class="btn btn-icon btn-primary pull-right waves-effect waves-circle" title="Return"><span class="zmdi zmdi-long-arrow-return"></span></a>
                        <a href="#" class="btn btn-icon btn-danger pull-right waves-effect waves-circle delete-user m-r-10" title="Return"><span class="zmdi zmdi-delete"></span></a>
                        </h2>
                    </div>
                    <div class="card-body card-padding">
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fg-float">
                                    <div class="fg-line">
                                        <input type="text" name="email" class="form-control required email" class="" value="<?php echo $user->email;?>">
                                        <label class="fg-label">Email</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fg-float">
                                    <div class="fg-line">
                                        <input type="text" name="password" id="password" class="form-control" value="">
                                        <label class="fg-label">Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fg-float">
                                    <div class="fg-line">
                                        <input type="text" name="password2" class="form-control equal" data-equal="password" value="">
                                        <label class="fg-label">Confirm password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fg-float">
                                    <div class="fg-line">
                                        <select class="chosen select_type_slider" name="rol">
                                            <option value="1" <?php echo ($user->rol == 1)?'selected':'';?>>Administrator</option>
                                            <option value="2" <?php echo ($user->rol == 2)?'selected':'';?>>Editor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fg-float">
                                    <div class="fg-line">
                                        <select class="chosen select_type_slider" name="country">
                                            <?php foreach($countries as $c):?>
                                                <option value="<?php echo $c->id?>" <?php echo ($user->country == $c->id)?'selected':'';?>><?php echo $c->name;?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
</section>


