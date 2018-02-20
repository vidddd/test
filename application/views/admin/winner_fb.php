<input type="hidden" value="winners_fb" id="redirect_page" />
<section id="main" data-layout="layout-1">
<?php
$this->load->view('admin/sidebar');
?>
    <section id="content">

        <div class="container loading-content">

            <?php
            $attributes = array('method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'ajax_form');
            echo form_open('adm-gst/save-winner',$attributes);
            ?>
                <input type="hidden" value="<?php echo ($this->uri->segment(3))?$this->uri->segment(3):'0';?>" id="edit" name="edit" />
                <div class="card" id="card_user">
                    <div class="card-header">
                        <h2>Winner FB</h2>
                    </div>
                    <div class="options-adds">
                        <a title="Go back" href="<?php echo base_url('adm-gst/pages')?>" class="btn bgm-teal btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-long-arrow-return"></i></a>
                    </div>
                    <div class="card-body card-padding" >
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="f-500 m-b-15 false-label">IMAGEN</p>
                                <?php
                                if(isset($winner)){
                                    if($winner->image == ''){
                                        unset($winner->image);
                                    }
                                }
                                ?>
                                <div class="fileinput <?php echo (isset($winner))?'fileinput-exists':'fileinput-new';?>" data-provides="fileinput" >
                                    <span class="btn btn-primary btn-file m-r-10 waves-effect">
                                        <span class="fileinput-new ">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image">
                                    </span>
                                    <?php
                                    if(isset($winner)){
                                    ?>
                                    <input type="hidden" name="old_image" value="<?php echo (isset($winner))?$winner->image:'';?>">
                                    <?php
                                    }
                                    ?>
                                    <span class="fileinput-filename"><?php echo (isset($winner))?$winner->image:'';?></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 m-b-15">
                                <p class="f-500 false-label m-b-0">WEEK</p>
                                <select class="chosen" name="week">
                                    <?php
                                    for($i=1;$i<=52;$i++) {
                                        $selected=false;
                                        if(isset($winner)){
                                            if($winner->week == $i){
                                                $selected=true;
                                            }
                                        }
                                    ?>
                                        <option value="<?php echo $i;?>" <?php echo ($selected)?'selected':'';?>><?php echo $i;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="user" value="<?php echo (isset($winner))?$winner->user:'';?>">
                                        <label class="fg-label">USER</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row m-t-15">
                            <div class="col-sm-12">
                                <p class="false-label f-500 m-b-0">TEXT</p>
                                <div class="form-group">
                                    <div class="fg-line">
                                        <textarea class="form-control auto-size" placeholder="" name="text"><?php echo (isset($winner))?$winner->text:'';?></textarea>
                                    </div>
                                </div>

                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group fg-float no-icon">
                                    <div class="fg-line">
                                        <input type="text" class="form-control fg-input"  name="likes" value="<?php echo (isset($winner))?$winner->likes:'';?>">
                                        <label class="fg-label">LIKES</label>
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