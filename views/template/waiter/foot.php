<footer>
<div id="feedback" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Обратная связь</h3>
                <a href="#" class="close" data-toggle="modal" title="Закрыть">×</a>
            </div>
            <div class="modal-body">
            <div class="block-form-info">
        <form class="form-info" method="POST" action="">
            <div class="form-info-input">
                <div class="input-block modal-block">
                    <input type="text" name="subject" placeholder="Тема">
                </div>
                <div class="input-block modal-block">
                    <input type="textarrea" name='message' placeholder="Описание проблемы">
                </div>
                <div class="input-block modal-block" id="button_modal_block">
                    <input type="button" id="modal_button" value="Отправить">
                </div>
            </div>
        </form>
    </div>

</footer>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="../sources/js/script.js"></script>
        <script src="../sources/js/info.js"></script>
    <?php if($_GET['path'] == 'my'): ?>
        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
        <script src="../sources/js/my.js"></script>
    <?php elseif($_GET['path'] == 'settings'): ?>
        <script src="../sources/js/settings.js"></script>
    <?php endif; ?>
	</body>
</html>