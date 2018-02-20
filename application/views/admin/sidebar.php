<aside id="sidebar" class="sidebar c-overflow">
    <ul class="main-menu">
        <li class="<?php echo ($this->uri->segment(2) == 'pages' )?'active ':'';?>">
            <a href="<?php echo base_url('adm-gst/pages')?>"><i class="zmdi zmdi-collection-image-o"></i> Sites</a>
        </li>
        <li class="<?php echo ($this->uri->segment(2) == 'langs' )?'active ':'';?>">
            <a href="<?php echo base_url('adm-gst/langs')?>"><i class="zmdi zmdi-translate"></i> Languages</a>
        </li>
        <li class="sub-menu <?php echo ($this->uri->segment(2) == 'gallery' || $this->uri->segment(2) == 'gallery_deleted' )?'toggled active ':'';?>" >
            <a href=""><i class="zmdi zmdi-thumb-up"></i> Gallery</a>
            <ul>
                <li><a class="<?php echo ($this->uri->segment(2) == 'gallery' )?'active ':'';?>" href="<?php echo base_url('adm-gst/gallery')?>">List</a></li>
                <li><a class="<?php echo ($this->uri->segment(2) == 'gallery_deleted' )?'active ':'';?>" href="<?php echo base_url('adm-gst/gallery_deleted')?>">Deleted</a></li>
            </ul>
        </li>
        <li class="sub-menu <?php echo ($this->uri->segment(2) == 'winners' || $this->uri->segment(2) == 'winners_fb' )?'toggled active ':'';?>" >
            <a href=""><i class="zmdi zmdi-thumb-up"></i> Winners</a>
            <ul>
                <li><a class="<?php echo ($this->uri->segment(2) == 'winners' )?'active ':'';?>" href="<?php echo base_url('adm-gst/winners')?>">Instagram</a></li>
                <li><a class="<?php echo ($this->uri->segment(2) == 'winners_fb' )?'active ':'';?>" href="<?php echo base_url('adm-gst/winners_fb')?>">Facebook</a></li>
            </ul>
        </li>
        <li class="<?php echo ($this->uri->segment(2) == 'feeds' )?'active ':'';?>">
            <a href="<?php echo base_url('adm-gst/feeds')?>"><i class="zmdi zmdi-facebook"></i> Facebook CR7</a>
        </li>
        <li class="<?php echo ($this->uri->segment(2) == 'newsletter' )?'active ':'';?>">
            <a href="<?php echo base_url('adm-gst/newsletter')?>"><i class="zmdi zmdi-assignment-account"></i> Newsletter</a>
        </li>
        <li>
            <a href="<?php echo base_url('adm-gst/logout')?>"><i class="zmdi zmdi-time-restore"></i> Logout</a>
        </li>
    </ul>
</aside>