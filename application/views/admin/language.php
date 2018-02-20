<input type="hidden" value="langs" id="redirect_page" />
<section id="main" data-layout="layout-1">
<?php
$this->load->view('admin/sidebar');
?>
    <section id="content">

        <div class="container loading-content">

            <?php
            $attributes = array('method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'ajax_form');
            echo form_open('adm-gst/save-lang',$attributes);
            ?>
                <input type="hidden" value="<?php echo ($this->uri->segment(3))?$this->uri->segment(3):'0';?>" id="edit" name="edit" />
                <div class="card" id="card_user">
                    <div class="card-header">
                        <h2>Lang</h2>
                    </div>
                    <div class="options-adds">
                        <a title="Go back" href="<?php echo base_url('adm-gst/langs')?>" class="btn bgm-teal btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-long-arrow-return"></i></a>
                    </div>
                    <div class="card-body card-padding" >

                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="name" value="<?php echo (isset($lang))?$lang->name:'';?>">
                                        <label class="fg-label">NAME</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="short" value="<?php echo (isset($lang))?$lang->short:'';?>">
                                        <label class="fg-label">SHORT NAME</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 m-b-15">
                                <p class="f-500 false-label m-b-0">FONT</p>
                                <select class="chosen" data-placeholder="Choose a Font..." name="font">
                                    <option value=""></option>
                                    <?php
                                    foreach ($fonts as $font) {
                                        $selected=false;
                                        if($lang->font == $font->id){
                                            $selected=true;
                                        }
                                    ?>
                                        <option value="<?php echo $font->id;?>" <?php echo ($selected)?'selected':'';?>><?php echo $font->name;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <div class="checkbox m-b-15">
                                    <?php
                                    $checked="";
                                    if(isset($lang)){
                                        if($lang->rtl == 1){
                                            $checked="checked";
                                        }
                                    }
                                    ?>
                                    <label>
                                        <input type="checkbox" value="1" name="rtl" <?php echo $checked; ?>>
                                        <i class="input-helper"></i>
                                        RIGHT TO LEFT TEXT
                                    </label>
                                </div>
                                <br>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-1 p-t-30 p-b-30 text-left">
                                <button type="submit" class="btn btn-primary btn-block waves-effect" >SAVE</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>    
            <?php if(isset($lang)){?>
            <div class="card">
                <div class="card-header">
                    <h2>Translations</h2>
                </div>
                <div class="card-body card-padding" >
                    <?php
                    $attributes = array('method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'ajax_form');
                    echo form_open('adm-gst/save-translate',$attributes);
                    ?>
                        <input type="hidden" name="lang" value="<?php echo $this->uri->segment(3);?>">
                        <div class="table table-striped table-vmiddle bootgrid-table">
                            <div class="row">
                                <div class="col-sm-12 p-t-30 p-b-30 text-left">
                                    <table id="data-table-basic" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="45%">Field</th>
                                                <th width="55%">Translate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($translates as $t) {
                                            ?>
                                            <tr>
                                                <td><?php echo $t->name?></td>
                                                <td>
                                                    <div class="form-group fg-float">
                                                        <div class="fg-line">
                                                            <input type="text" class="input-sm form-control fg-input" name="translate_<?php echo $t->id;?>" value="<?php echo (isset($t->translate)?$t->translate:'')?>" />
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>        
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-2 p-t-30 p-b-30 text-left">
                                    <button type="submit" class="btn btn-primary btn-block waves-effect" >SAVE TRANLATIONS</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php }?>
        </div>
    </section>
</section>