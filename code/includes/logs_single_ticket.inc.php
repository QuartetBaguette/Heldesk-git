<?php require 'php/logs/get_logs.php'; ?>

<div class="container">

<a href="index.php?page=admin_dashboard&part=logs"> <button class="btn btn-success">Go back</button></a>

</br>
</br>

<div class="row">
    <div class="col-sm-1" id="log_col">
        <label><b>Views:</b></label> </br>
        <?php echo $views['ticket_views']; ?>
    </div>
</div>

</br>

    <?php foreach($logs as $log) { ?>

        <div class="row" id="log_row">

            <div class="col-sm-1" id="log_col">
                <label><b>Ticket:</b></label> </br>
                <?php echo $log['ticketID']; ?>
            </div>

            <div class="col-sm-2" id="log_col">
                <label><b>Date/time of action:</b></label> </br>
                <?php echo $log['action_time']; ?>
            </div>

            <div class="col-sm-4" id="log_col">
                <label><b>State change:</b></label> </br>
                <?php echo $log['change_state']; ?>
            </div>

            <div class="col-sm-3" id="log_col">
                <label><b>Employee change:</b></label> </br>
                <?php echo $log['change_employee']; ?>
            </div>

            <div class="col-sm" id="log_col">
                <label><b>Priority change:</b></label> </br>
                <?php echo $log['change_priority']; ?>
            </div>

        </div>

    </br>

    <?php } ?>

    <a href="index.php?page=admin_dashboard&part=logs"> <button class="btn btn-success">Go back</button></a>

</div>