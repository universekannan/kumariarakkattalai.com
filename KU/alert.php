    
<style>
.alert{
    top: 17%;
    width: 100%;
    margin-bottom: 10px;
    z-index:9;
    position: absolute;
}
</style>
    
    <div class="alert <?= $alertType; ?> alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?= $alertMsg; ?>            
    </div>

<script>
    (function() {    
    var fade = document.querySelector('.alert');
    var interval = setInterval(function() {

        if (!fade.style.opacity) {
            fade.style.opacity = 1;
        }
        if (fade.style.opacity > 0) {
            fade.style.opacity -= 0.1;
        } else {
            clearInterval(interval);
            fade.style.display = 'none';
        }

    }, 500);
    })();
</script>