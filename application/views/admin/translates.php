 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');
    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>
                    Translates
                        <a href="<?php echo base_url('adm-gst/translates/'.$this->uri->segment(3).'/production');?>" class="btn btn-primary pull-right waves-effect m-l-30 go_production_translate" title="Go to Producction"><span class="zmdi zmdi-check"></span> Go to Production</a>
                    
                    <select class="chosen pull-right" id="countries_lang">
                        <option value=""></option>
                        <?php foreach($countries as $c):?>
                            <option value="<?php echo $c->id?>" <?php echo ($country == $c->id)?'selected':'';?>><?php echo $c->name;?></option>
                        <?php endforeach?>
                    </select>
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
                            foreach ($translates as $t) {
                            ?>
                            <tr>
                                <td><?php echo ((array_search($t->idTranslate, $changes) !== false)?'<span style="color: #d9006b">*</span> ':'').$t->id;?></td>
                                <td><?php echo $t->name?></td>
                                <td>
                                    <?php echo form_open('adm-gst/translates/'.$t->lang.'/save','id="form-translate"');?>
                                    <input type="hidden" name="idTranslate" value="<?php echo $t->idTranslate?>" />
                                    <div class="form-group fg-float">
                                        <div class="fg-line">
                                            <input type="text" class="input-sm form-control fg-input input-translate" name="translate" value="<?php echo $t->translate;?>" />
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
