        

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Por favor, Espere...</p>
            </div>
        </div>

        <div class="modal fade modal-box" id="success" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title m-b-15" id="success-text">¡Perfecto!</h2>
                        <p>Cambios guardados correctamente</p>
                    </div>
                    <div class="modal-body">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect close-modal" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="<?php echo base_url('resources/admin/')?>img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="<?php echo base_url('resources/admin/')?>img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="<?php echo base_url('resources/admin/')?>img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="<?php echo base_url('resources/admin/')?>img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="<?php echo base_url('resources/admin/')?>img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

        <!-- Javascript Libraries -->
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/fileinput/fileinput.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/jquery-form/jquery.form.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/chosen/chosen.jquery.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/summernote/dist/summernote-updated.min.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>vendors/bower_components/autosize/dist/autosize.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url('resources/admin/')?>js/flot-charts/curved-line-chart.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>js/flot-charts/line-chart.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>js/charts.js"></script>


        <script src="<?php echo base_url('resources/admin/')?>js/functions.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>js/demo.js"></script>
        <script src="<?php echo base_url('resources/admin/')?>js/private.js"></script>


    </body>
  </html>