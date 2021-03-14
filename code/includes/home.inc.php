</br>

<div class="row">
    <div class="col-lg-4 card-padding">
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="../Images/support.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Need support?</h5>
            <p class="card-text">Do you need help with a problem you are encountering? Request a ticket!</p>
            <a href="
                <?php if(!isset($_SESSION['ingelogd'])) { ?>
                    index.php?page=login&ref=request_ticket
                <?php } else{?>
                    index.php?page=helpdesk&part=ticket
                <?php } ?>
                    
                <?php if(isset($_SESSION['roleID']) && $_SESSION['roleID'] == 1) {?>
                    " class="btn btn-primary"
                <?php } else if(!isset($_SESSION['ingelogd'])){ ?>
                    " class="btn btn-primary"
                <?php } else {?>
                    " class="btn btn-primary disabled"
                <?php } ?>
            >I need support!</a>
        </div>
        </div>
    </div>
    <div class="col-lg-4 card-padding">
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="../Images/iphone12.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">The new Iphone 12!</h5>
            <p class="card-text">We have got the new Iphone 12 early in our hands check the early review now!</p>
            <a href="https://tweakers.net/reviews/8272/apple-iphone-12-en-12-pro-de-meerwaarde-van-pro.html" class="btn btn-primary" target="_blank">Check it!</a>
        </div>
        </div>
    </div>
    <div class="col-lg-4 card-padding">
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="../Images/macbook.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Apple's own processor!?</h5>
            <p class="card-text">Is the home made Apple M1 chip any good? Can it keep up to the competition?</p>
            <a href="https://tweakers.net/reviews/7962/apple-macbook-pro-2020-nieuw-toetsenbord-oude-hardware.html" class="btn btn-primary" target="_blank">Find out!</a>
        </div>
        </div>
    </div>
    
</div>

</br>

<div class="row">

    <div class="col-lg-3">
        <h4>Lorem Ipsum</h4>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum venenatis posuere. Maecenas sagittis scelerisque orci sit amet euismod. Nulla quis mi enim. Vestibulum vitae mi justo. Ut posuere leo nisl, at eleifend felis efficitur eget. Donec id libero euismod, consequat ante mollis, aliquet justo. Maecenas fringilla lectus eget mi euismod molestie. Nam diam quam, molestie non tellus vel, semper pharetra dui.
        </p>
    </div>

    <div class="col-lg-3">
        <h4>Lorem Ipsum</h4>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum venenatis posuere. Maecenas sagittis scelerisque orci sit amet euismod. Nulla quis mi enim. Vestibulum vitae mi justo. Ut posuere leo nisl, at eleifend felis efficitur eget. Donec id libero euismod, consequat ante mollis, aliquet justo. Maecenas fringilla lectus eget mi euismod molestie. Nam diam quam, molestie non tellus vel, semper pharetra dui.
        </p>
    </div>

    <div class="col-lg-3">
        <h4>Lorem Ipsum</h4>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum venenatis posuere. Maecenas sagittis scelerisque orci sit amet euismod. Nulla quis mi enim. Vestibulum vitae mi justo. Ut posuere leo nisl, at eleifend felis efficitur eget. Donec id libero euismod, consequat ante mollis, aliquet justo. Maecenas fringilla lectus eget mi euismod molestie. Nam diam quam, molestie non tellus vel, semper pharetra dui.
        </p>
    </div>

    <div class="col-lg-3">
        <h4>Lorem Ipsum</h4>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum venenatis posuere. Maecenas sagittis scelerisque orci sit amet euismod. Nulla quis mi enim. Vestibulum vitae mi justo. Ut posuere leo nisl, at eleifend felis efficitur eget. Donec id libero euismod, consequat ante mollis, aliquet justo. Maecenas fringilla lectus eget mi euismod molestie. Nam diam quam, molestie non tellus vel, semper pharetra dui.
        </p>
    </div>

</div>

</br>