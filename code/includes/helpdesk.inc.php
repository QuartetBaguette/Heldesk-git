<?php

if(isset($_SESSION['dangerMsg']) || isset($_SESSION['errMsg'])){
    //zet alle session messages op nul
    unset($_SESSION['dangerMsg']);
    unset($_SESSION['errMsg']);
}

?>

<div class="selector">
    <div class="container" id="function_selector">

        <div class="btn-group btn-group-toggle" data-toggle="buttons">

            <label class="btn btn-success active">
                <input type="radio" name="options" id="request_ticket" autocomplete="off"> Request a ticket
            </label>
            
            <label class="btn btn-success">
                <input type="radio" name="options" id="ticket_overview" autocomplete="off"> Ticket overview
            </label>

        </div>
</div>

    <div id="content">

        

    </div>

</div>


<script>

    $(document).ready(function() {
        $('#request_ticket').on('click', request_ticket);
        $('#ticket_overview').on('click', ticket_overview);
        var $_GET=[];
        window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
        if($_GET['part'] == 'ticket'){
            request_ticket();
        }
        if($_GET['overview'] == 'overview'){
            ticket_overview();
        }
    })

    function request_ticket(){
        $.ajax({
            mehtod:"GET",
            url: "includes/include_part/request_ticket.part.php"
        }).done(function(response){
            $('#content').html(response)
        }).fail(function(){
            alert('Oops! Something went wrong! Please try again later.')
        })
    }

    function ticket_overview(){
        $.ajax({
            mehtod:"GET",
            url: "includes/include_part/ticket_overview.part.php"
        }).done(function(response){
            $('#content').html(response)
        }).fail(function(){
            alert('Oops! Something went wrong! Please try again later.')
        })
    }
    

</script>
