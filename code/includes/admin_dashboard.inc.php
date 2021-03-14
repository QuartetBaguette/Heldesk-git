<?php 
  $name = $_SESSION['customer_name'];

  if(isset($_SESSION['dangerMsg']) || isset($_SESSION['errMsg'])){
    //zet alle session messages op nul
    unset($_SESSION['dangerMsg']);
    unset($_SESSION['errMsg']);
}
?>

<div class="jumbotron">
  <h1>Welcome <?php echo $name['name']; ?></h1>      
  <p>Select what you want to do! Good luck!</p>
</div>

<div class="selector">
    <div class="container" id="function_selector">

        <div class="btn-group btn-group-toggle" data-toggle="buttons">

            <label class="btn btn-success">
                <input type="radio" name="options" id="crud_user" autocomplete="off"> Edit/Delete users
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="options" id="ticket_logs" autocomplete="off"> Logs
            </label>

        </div>
</div>

    <div id="content">

        

    </div>

</div>

<script>

    $(document).ready(function() {
        $('#crud_user').on('click', crud_user);
        $('#ticket_logs').on('click', ticket_logs);
        var $_GET=[];
        window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
        if($_GET['part'] == 'logs'){
            ticket_logs();
        }
        if($_GET['part'] == 'crud_users'){
            crud_user();
        }
    })

    function crud_user(){
        $.ajax({
            mehtod:"GET",
            url: "includes/include_part/show_all_users.part.php"
        }).done(function(response){
            $('#content').html(response)
        }).fail(function(){
            alert('Oops! Something went wrong! Please try again later.')
        })
    }

    function ticket_logs(){
        $.ajax({
            mehtod:"GET",
            url: "includes/include_part/log_overview.part.php"
        }).done(function(response){
            $('#content').html(response)
        }).fail(function(){
            alert('Oops! Something went wrong! Please try again later.')
        })
    }

</script>
