 <section id="main" data-layout="layout-1">
    <?php
    $this->load->view('admin/sidebar');
    ?>
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>
                    FAQs

                    <?php if(count($faqs) && $user->rol == 1):?>
                        <a href="<?php echo base_url('adm-gst/faq/'.$this->uri->segment(3).'/production');?>" class="btn btn-primary pull-right waves-effect m-l-30 go_production_faq" title="Go to Producction"><span class="zmdi zmdi-check"></span> Go to Production</a>
                    <?php endif;?>
                    <?php if($country != 0):?>
                    <a href="" class="btn btn-primary btn-icon pull-right waves-effect m-l-30 m-r-30 add-faq" title="Add FAQ" data-lang="<?php echo $country?>"><span class="zmdi zmdi-plus"></span></a>
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

                <div id="content_faq" class="table table-striped table-vmiddle bootgrid-table">
                    <table id="data-table-basic" class="table table-striped" <?php echo (count($faqs) == 0)?'style="display:none;"':'';?>>
                        <thead>
                            <tr>
                                <th width="35%">Title</th>
                                <th width="55%">Description</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                    </table>
                    <?php
                    foreach ($faqs as $f) {
                    ?>
                        <?php echo form_open(base_url('adm-gst/faq/'.$f->lang.'/save'),'class="form-faq" id="form-faq-'.$f->id.'"');?>
                        <table class="table table-striped">
                            <tr>
                                <input type="hidden" name="idFAQ" value="<?php echo $f->id?>" />
                                <td width="35%">
                                    <div class="form-group fg-float">
                                        <div class="fg-line">
                                        <?php echo ((array_search($f->id, $changes) !== false)?'<span style="color: #d9006b">*</span> ':'')?> <input type="text" class="input-sm form-control fg-input input-translate required" name="title" value="<?php echo $f->title;?>" />
                                        </div>
                                    </div>
                                </td>
                                <td width="55%">
                                    <div class="html-editor" id="editor-<?php echo $f->id;?>"><?php echo $f->description;?></div>
                                </td>
                                <td width="10%">
                                    <button type="submit" class="btn btn-primary btn-icon waves-effect waves-circle waves-float" title="Save FAQ"><i class="zmdi zmdi-floppy"></i></button>
                                    <a href="<?php echo base_url('adm-gst/faq/'.$f->lang.'/delete/'.$f->id)?>" class="btn btn-primary btn-icon pull-right waves-effect delete-faq" title="Remove FAQ" data-lang="<?php echo $country?>"><span class="zmdi zmdi-delete"></span></a>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    }
                    ?>
                    <?php if(count($faqs) == 0):?>
                        <div class="card-body card-padding m-t-30 m-b-30">
                            <div class="alert alert-danger" role="alert">
                                <?php if(($this->uri->segment(3) == false && $user->rol == 1)):?>
                                    Select a language to display!
                                <?php else:?>
                                    There are no faqs to display, please add one
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
</section>
