<?php

    if(isset($pageHeading)){
        $pageHeading = $pageHeading;
    }else {
        echo "My Login System";
    }
?>


<!-- body contents -->
<div class="container-fluid">
    <div class="row">
        <div class="col h-25 bg-primary hai-hedingDiv d-flex justify-content-center align-items-center" style="min-height: 10vh;">
            <div class="back-heading p-2">
                <h1 class="text-white text-center">Welcome to UBT's <?php $pageHeading ?> Page</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-md">
    <div class="row">
        <div class="col-md-9 bg-body p-2 mb-2 border" style="min-height: 65vh;">
            <h5 class="text-center text-primary">This is main content</h5>
        </div>
        <div class="col-md-3 bg-light p-2 mb-2" style="min-height: 65vh;">
            <h5 class="text-center text-primary">Our Sponsors:</h5>
            <div class="col-md-2.5 bg-success p-4 border mb-1">Ad: 01</div>
            <div class="col-md-2.5 bg-danger p-4 border mb-1">Ad: 02</div>
            <div class="col-md-2.5 bg-warning p-4 border mb-1">Ad: 03</div>
        </div>
    </div>
</div>

<div class="container-md">
    <div class="row">
        <div class="col bg-light p-2 mb-2 border" style="min-height: 35vh;">
            <h5 class="text-center text-primary">Bottom section</h5>
            <p>
                <ul4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero laborum illum iste odio ipsum? Sequi eum neque id consequatur nisi!</ul4>
            </p>
        </div>
    </div>
</div>