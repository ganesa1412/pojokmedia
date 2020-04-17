            <h6 class="text-center">
                &copy; 2016. Administrator System by <a href="<?php echo base_url('article_old') ?>">Esafriansya</a>
            </h6>
        </section>
      </div>

    </section>

    <!-- Vendor -->
    <script src="<?php echo base_url() ?>assets/vendor/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/js/jquery.browser.mobile.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/js/nanoscroller.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/js/pnotify.custom.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/js/summernote.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/js/datatables.js"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="<?php echo base_url() ?>assets/javascripts/theme.js"></script>
    
    <!-- Theme Custom -->
    <script src="<?php echo base_url() ?>assets/javascripts/theme.custom.js"></script>
    
    <!-- Theme Initialization Files -->
    <script src="<?php echo base_url() ?>assets/javascripts/theme.init.js"></script>

    <script type="text/javascript">
    
    $('.summernote').summernote({
        height:'230px',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['misc', ['fullscreen','undo','redo']]
        ]
    });

    function addf(countr,area, type){
      var count = parseFloat($(countr).val())+1;
      var objTo = document.getElementById(area);
      var divtest = document.createElement("div");
      divtest.setAttribute("class", "multiple removeclass"+count);
      var rdiv = 'removeclass'+count;
      if (type == "img") {
        divtest.innerHTML = '<input type="hidden" name="type'+count+'" value="img">' +
                            '<label>Image:</label>' +
                            '<input type="file" class="form-control" name="image'+count+'">' +
                            '<br>' +
                            '<label>Caption:</label>' +
                            '<input type="text" placeholder="Caption" class="form-control" name="caption'+count+'">' +
                            '<br>' +
                            '<button class="btn btn-danger" type="button" onclick="remove_ctn('+count+')">' +
                                '<span class="fa fa-close"></span> Hapus' +
                            '</button><br><br>'
      }else{
        divtest.innerHTML = '<input type="hidden" name="type'+count+'" value="ctn">' +
                            '<label>Isi:</label>' +
                            '<textarea class="summernote" placeholder="Isi" name="content'+count+'"  data-plugin-summernote ></textarea>' +
                            '<button class="btn btn-danger" type="button" onclick="remove_ctn('+count+')">' +
                                '<span class="fa fa-close"></span> Hapus' +
                            '</button><br><br>'
      }
      objTo.appendChild(divtest);

        $('.summernote').summernote({
            height:'230px',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['misc', ['fullscreen','undo','redo']]
            ]
        });
        
      $(countr).val(count);
     }

     function remove_ctn(countr) {
      $('.removeclass'+countr).remove();
     }
</script>

    <?php 
        if (isset($notification)) {
     ?>
    <script type="text/javascript">
        var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
        $(document).ready(function(){
            var notice = new PNotify({
                title: '<?php echo $notification['text']?>',
                text: 'klik untuk menutup',
                addclass: 'notification-<?php echo $notification['class'] ?> stack-bottomright ',
                icon: 'fa <?php echo $notification['icon']?>',
                stack: stack_bottomright,
                buttons: {
                    sticker: false,
                    closer: false
                }
            });
            notice.get().click(function() {
                notice.remove();
            });
        });
    </script>
    <?php 
        }
     ?>
  </body>
</html>