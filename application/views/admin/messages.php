<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>messages</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <link rel="stylesheet" href="<?=base_url('public/')?>css/admin_style.css">

  <!-- clear confirm form resubmission -->
  <script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  </script>

</head>

<body>

<?php
  $admin_header['admin'] = $admin;
  $this->load->view('template/admin_header',$admin_header) ?>

  <section class="contacts">

    <h1 class="heading">messages</h1>

    <div class="box-container">

      <?php foreach ($messages as $message):?>
      <div class="box">
        <p> user id : <span><?= $message['user_id']; ?></span></p>
        <p> name : <span><?= $message['name']; ?></span></p>
        <p> email : <span><?= $message['email']; ?></span></p>
        <p> number : <span><?= $message['number']; ?></span></p>
        <p> message : <span><?= $message['message']; ?></span></p>
        <a href="<?=base_url('Admin/messages/'.$message['id']); ?>" onclick="return confirm('delete this message?');"
          class="delete-btn">delete</a>
      </div>
      <?php endforeach; ?>

    </div>

  </section>


  <script src="<?=base_url('public/')?>js/admin_script.js"></script>

</body>

</html>