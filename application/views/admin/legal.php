 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');

    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Legal

                        <?php if($user->rol == 1 && $country != 0):?>
                            <a href="<?php echo base_url('adm-gst/legal/'.$this->uri->segment(3).'/production');?>" class="btn btn-primary pull-right waves-effect m-l-30 go_production_faq" title="Go to Producction"><span class="zmdi zmdi-check"></span> Go to Production</a>
                        <?php endif;?>
                        <?php if($user->rol == 1):?>
                            <select class="chosen pull-right" id="countries_lang">
                                <option value=""></option>
                                <?php foreach($countries as $c):?>
                                    <option value="<?php echo $c->id?>" <?php echo ($country == $c->id)?'selected':'';?>><?php echo $c->name;?></option>
                                <?php endforeach?>
                            </select>
                        <?php endif;?>
                    </h2>
                </div>
                <?php
                if($country != 0) {
                echo form_open('adm-gst/legal/'.$country.'/save','id="form-legal"');?>
                    <input type="hidden" name="idLegal" value="<?php echo $legal->id;?>">
                    <div class="card-body card-padding">
                        <br>
                        <br>
                        <div class="html-editor" id="text-editor"><?php echo $legal->text;?></div>

                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                            </div>
                        </div>

                    </div>
                </form>
                <?php }?>
            </div>
        </div>
    </section>
</section>


