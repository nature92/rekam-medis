<!-- End Content  -->

<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
                <ul class="nav">
                    <li class="nav-item">
                        Corfin Information System © 2020 <?php if (date('Y') != 2020) echo ' - ' . date('Y') ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>

</body>

<script>
    function startLoader() {
        $('.modal-loader').removeAttr('hidden');
    }

    function finishLoader() {
        $('.modal-loader').attr('hidden', 'hidden');
    }

    document.onreadystatechange = () => {
        $('.loader').removeAttr('hidden');
        if (document.readyState === 'complete') {
            $('.loader').attr('hidden', 'hidden');

            setTimeout(() => {
                $('#auto-hidden').attr('hidden', 'hidden');
            }, 15000)
        }
    };

    $('.trigger-collapse').on('click', (event) => {
        const button = event.currentTarget;
        const target = $(button).data('target');

        $('#' + target).collapse('toggle');
        console.log('collapsed');
    })
</script>

<!-- </div>


</body>


</html> -->