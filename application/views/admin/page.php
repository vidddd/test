<input type="hidden" value="pages" id="redirect_page" />
<section id="main" data-layout="layout-1">
<?php
$this->load->view('admin/sidebar');
?>
    <section id="content">

        <div class="container loading-content">

            <?php
            $attributes = array('method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'ajax_form');
            echo form_open('adm-gst/save-site',$attributes);
            ?>
                <input type="hidden" value="<?php echo ($this->uri->segment(3))?$this->uri->segment(3):'0';?>" id="edit" name="edit" />
                <div class="card" id="card_user">
                    <div class="card-header">
                        <h2>Page</h2>
                    </div>
                    <div class="options-adds">
                        <a title="Go back" href="<?php echo base_url('adm-gst/pages')?>" class="btn bgm-teal btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-long-arrow-return"></i></a>
                    </div>
                    <div class="card-body card-padding" >
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="f-500 m-b-15 false-label">FLAG</p>
                                <?php
                                if(isset($site)){
                                    if($site->flag == ''){
                                        unset($site->flag);
                                    }
                                }
                                ?>
                                <div class="fileinput <?php echo (isset($site))?'fileinput-exists':'fileinput-new';?>" data-provides="fileinput" >
                                    <span class="btn btn-primary btn-file m-r-10 waves-effect">
                                        <span class="fileinput-new ">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="flag">
                                    </span>
                                    <?php
                                    if(isset($site)){
                                    ?>
                                    <input type="hidden" name="old_flag" value="<?php echo (isset($site))?$site->flag:'';?>">
                                    <?php
                                    }
                                    ?>
                                    <span class="fileinput-filename"><?php echo (isset($site))?$site->flag:'';?></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="name" value="<?php echo (isset($site))?$site->name:'';?>">
                                        <label class="fg-label">NAME</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="short" value="<?php echo (isset($site))?$site->short:'';?>">
                                        <label class="fg-label">SHORT NAME</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="url" value="<?php echo (isset($site))?$site->url:'';?>">
                                        <label class="fg-label">EXTRA URL LANGUAGE</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 m-b-15">
                                <p class="f-500 false-label m-b-0">DEFAULT LANGUAGE</p>
                                <select class="chosen" data-placeholder="Choose a Language..." name="lang">
                                    <option value=""></option>
                                    <?php
                                    foreach ($languages as $language) {
                                        $selected=false;
                                        if(isset($site)){
                                            if($site->lang == $language->id){
                                                $selected=true;
                                            }
                                        }
                                    ?>
                                        <option value="<?php echo $language->id;?>" <?php echo ($selected)?'selected':'';?>><?php echo $language->name;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 m-b-15">
                                <p class="f-500 false-label m-b-0">LANGUAGES</p>
                                <select class="chosen" multiple data-placeholder="Choose Languages..." name="my_langs[]">
                                    <option value=""></option>
                                    <?php
                                    foreach ($languages as $language) {
                                        $selected=false;
                                        if(isset($site)){
                                            if(in_array($language->id,$my_langs)){
                                                $selected=true;
                                            }
                                        }
                                    ?>
                                        <option value="<?php echo $language->id;?>" <?php echo ($selected)?'selected':'';?>><?php echo $language->name;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="f-500 m-b-15 false-label">BANNER</p>
                                <?php
                                if(isset($site)){
                                    if($site->banner == ''){
                                        unset($site->banner);
                                    }
                                }
                                ?>
                                <div class="fileinput <?php echo (isset($site->banner))?'fileinput-exists':'fileinput-new';?>" data-provides="fileinput" >
                                    <span class="btn btn-primary btn-file m-r-10 waves-effect">
                                        <span class="fileinput-new ">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="banner">
                                    </span>
                                    <?php
                                    if(isset($site)){
                                    ?>
                                    <input type="hidden" name="old_banner" value="<?php echo (isset($site->banner))?$site->banner:'';?>">
                                    <?php
                                    }
                                    ?>
                                    <span class="fileinput-filename"><?php echo (isset($site->banner))?$site->banner:'';?></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="f-500 m-b-15 false-label">BANNER MOBILE</p>
                                <?php
                                if(isset($site)){
                                    if($site->banner_mobile == ''){
                                        unset($site->banner_mobile);
                                    }
                                }
                                ?>
                                <div class="fileinput <?php echo (isset($site->banner_mobile))?'fileinput-exists':'fileinput-new';?>" data-provides="fileinput" >
                                    <span class="btn btn-primary btn-file m-r-10 waves-effect">
                                        <span class="fileinput-new ">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="banner_mobile">
                                    </span>
                                    <?php
                                    if(isset($site)){
                                    ?>
                                    <input type="hidden" name="old_banner_mobile" value="<?php echo (isset($site->banner_mobile))?$site->banner_mobile:'';?>">
                                    <?php
                                    }
                                    ?>
                                    <span class="fileinput-filename"><?php echo (isset($site->banner_mobile))?$site->banner_mobile:'';?></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="link_banner" value="<?php echo (isset($site))?$site->url:'';?>">
                                        <label class="fg-label">LINK BANNER</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="link_shop" value="<?php echo (isset($site))?$site->link_shop:'';?>">
                                        <label class="fg-label">LINK SHOP</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="rrss_fb" value="<?php echo (isset($site))?$site->rrss_fb:'';?>">
                                        <label class="fg-label">RRSS FB</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="rrss_ig" value="<?php echo (isset($site))?$site->rrss_ig:'';?>">
                                        <label class="fg-label">RRSS IG</label>
                                    </div>
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
        </div>
    </section>
</section>