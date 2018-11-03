        <?php $this->load->view('common/v_head'); ?>
        <script type="text/javascript" src="<?= base_url();?>scripts/ajax_form.js"></script>
        <script type="text/javascript" src="<?= base_url();?>scripts/ajax_param.js"></script>
    </head>
    <body>

        <input type ="hidden" id="base-url" data-base_url="<?= base_url(); ?>">

        <div class="container">
            <?= $contents; ?>
        </div>
        <script type="text/javascript" src="<?= base_url();?>scripts/config.js"></script>

    </body>
</html>

