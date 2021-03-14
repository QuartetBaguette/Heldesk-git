<?php require '../../php/get_userinfo.php'; ?>

</br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">E-mail</th>
      <th scope="col">Role</th>
      <th width="8%"></th>
      <th width="8%"></th>

    </tr>
  </thead>
  <tbody>

    <?php foreach($data as $userinfo) { ?>
        <tr>           
          <td><?php echo $userinfo['userID']; ?></td>
          <td><?php echo $userinfo['email']; ?></td>
          <td><?php echo $userinfo['roletype']; ?></td>
          <td>
            <form action="index.php?page=edit_user" method="post">
              <input type="hidden" name="ID" value="<?php echo $userinfo['userID']; ?>">
              <input type="submit" class="btn btn-primary" name="edit" value="Edit" class='submit'/>         
            </form>
            </td>
            <td>
            <form action="php/crud_user/delete_user.php" method="post">
              <input type="hidden" name="ID" value="<?php echo $userinfo['userID']; ?>">
              <input type="submit" class="btn btn-danger" name="delete" value="Delete" class='submit'/>             
            </form>
          </td>     
        </tr>
    <?php } ?>

  </tbody>
</table>