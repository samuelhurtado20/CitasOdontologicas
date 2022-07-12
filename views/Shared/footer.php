
        </main>
    </div>

    <footer class="border-top footer bg-dark text-white">
        <div class="container">
            &copy; 2022 - <?php echo constant("SITE_NAME"); ?>
        </div>
    </footer>

    <script src="../../<?php echo constant("URL_SUBFOLDER"); ?>/public/lib/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="../../<?php echo constant("URL_SUBFOLDER"); ?>/public/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="../../<?php echo constant("URL_SUBFOLDER"); ?>/public/js/site.js" asp-append-version="true"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/e19c476714.js"></script>

    <script type="text/javascript">
        function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

        $(document).ready(function(){
            $(document).on("keydown", disableF5);
        });

        //function preventBack(){window.history.forward();}
            //setTimeout("preventBack()", 0);
            //window.onunload=function(){alert();};

            //window.onbeforeunload = function() {
            //return "Do you want to leave this page?";
        //}
    </script>
</body>
</html>