
<!-- Bootstrap Bundle with Popper CDN link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Our Custom js files for each page -->
<div class="container-fluid mx-0">
    <div class="row">
        <div class="col bg-dark p-2 mt-2">
            <h5 class="text-center text-white">Footer Section</h5>
            <p class="text-white text-center fs-6">This site design by UBT | <span id="year"></span> &#64; All right reserved</p>
        </div>
    </div>
</div>


<!-- Initialize Tooltip script everywhare -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<?php
    if(isset($script)){
        echo $script;
    }else {
        echo "<script src=\"assets/js/myscript.js\"></script>";
    }
?>

</body>
</html>