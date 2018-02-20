<input type="hidden" value="feeds" id="redirect_page" />
<section id="main" data-layout="layout-1">
<?php
$this->load->view('admin/sidebar');
?>
    <section id="content">

        <div class="container loading-content">

            <?php
            $attributes = array('method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'ajax_form');
            echo form_open('adm-gst/save-feed',$attributes);
            ?>
                <input type="hidden" value="<?php echo ($this->uri->segment(3))?$this->uri->segment(3):'0';?>" id="edit" name="edit" />
                <div class="card" id="card_user">
                    <div class="card-header">
                        <h2>FACEBOOK CR 7</h2>
                    </div>
                    <div class="options-adds">
                        <a title="Go back" href="<?php echo base_url('adm-gst/feeds')?>" class="btn bgm-teal btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-long-arrow-return"></i></a>
                    </div>
                    <div class="card-body card-padding" >

                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="name" value="<?php echo (isset($feed))?$feed->name:'';?>">
                                        <label class="fg-label">NAME</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>

                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <p class="false-label f-500 m-t-20 m-b-0">IFRAME HTML CODE</p>
                                <div class="form-group">
                                    <div class="fg-line">
                                        <textarea class="form-control auto-size" placeholder="" name="iframe"><?php echo (isset($feed))?$feed->iframe:'';?></textarea>
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