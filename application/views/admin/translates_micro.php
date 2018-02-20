 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');
    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>
                    Translates Microsite

                    <?php if(count($translates) && $user->rol == 1):?>
                        <a href="<?php echo base_url('adm-gst/translates-micro/'.$this->uri->segment(3).'/production');?>" class="btn btn-primary pull-right waves-effect m-l-30 go_production_translate" title="Go to Producction"><span class="zmdi zmdi-check"></span> Go to Production</a>
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

                <?php if(count($translates)):?>
                <div class="table table-striped table-vmiddle bootgrid-table">
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="40%">Field</th>
                                <th width="55%">Translate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $field_img = array(20=>'Tamaño de la imagen 228x484',21=>'Tamaño de la imagen 228x484',22=>'Tamaño de la imagen 228x484',23=>'Tamaño de la imagen 228x484',25=>'Tamaño de la imagen 1182x653',36=>'Tamaño de la imagen 600x600');
                            foreach ($translates as $t) {
                            ?>
                            <tr>
                                <td><?php echo ((array_search($t->idTranslate, $changes) !== false)?'<span style="color: #d9006b">*</span> ':'').$t->id;?></td>
                                <td><?php echo $t->name?></td>
                                <td>
                                    <?php echo form_open('adm-gst/translates-micro/'.$t->lang.'/save','id="form-translate"');?>
                                    <input type="hidden" name="idTranslate" value="<?php echo $t->idTranslate?>" />
                                    <div class="form-group fg-float">
                                        <div class="fg-line">
                                            <?php if(array_key_exists($t->id, $field_img) !== false) {?>
                                            <input type="hidden" name="isImage" value="1" />
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px;">
                                                    <?php if($t->translate != '') {
                                                        echo '<img src="'.base_url($t->translate).'" />';
                                                    }?>

                                                </div>
                                                <div>
                                                    <span class="btn btn-info btn-file waves-effect">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="hidden"><input type="file" class="image-translate" name="image_translate">
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists waves-effect" data-dismiss="fileinput">Remove</a>
                                                </div>
                                                <div><small><?php echo $field_img[$t->id]?></small></div>
                                            </div>

                                            <?php } else {?>
                                            <input type="hidden" name="isImage" value="0" />
                                            <input type="text" class="input-sm form-control fg-input input-translate" name="translate" value="<?php echo $t->translate;?>" />
                                            <?php }?>
                                        </div>
                                    </div>
                                    </form>
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
                        <div class="alert alert-danger" role="alert">Select a language to display!</div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </section>
</section>
