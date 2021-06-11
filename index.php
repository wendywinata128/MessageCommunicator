<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MSG SENDED - Communicate with your mobile</title>
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <nav>
    <h1>Simple Communicator</h1>
  </nav>

  <div class="container">
    <h2>Send Message</h2>
    <form method="POST" action="addNewText.php" enctype="multipart/form-data">
      <div class="input-group">
        <div class="title">Your Message</div>
        <textarea name="message" id="message" placeholder="Your message here...."></textarea>
      </div>

      <div class="input-group">
        <div class="title">Set Your Key</div>
        <input name="key" type="text" placeholder="Your Key" />
      </div>

      <button>Send Message</button>
    </form>

  </div>

  <div class="container">
    <h2>Get Your Message</h2>
    <form action="./index.php" method="POST">
      <div class="input-group">
        <div class="title">Input Your Key</div>
        <input name="openKey" type="text" placeholder="Your Key" />
      </div>
      <button>Get Message</button>
    </form>

  </div>

  <div class="container-2">
    <div class="close">
      X
    </div>

    <div class="messages">

      <?php
      include 'database.php';

      if (isset($_POST['openKey'])) {
        $key = $_POST['openKey'];
        echo
          '
          <script>
            let btnClose = document.querySelector(".close");
            let container2 = document.querySelector(".container-2");
            container2.classList.toggle("open");
            btnClose.addEventListener("click", () => {
              container2.classList.toggle("open");
            })
          </script>
          <div class="key">#' . $key . '</div>
          ';





        $query = mysqli_query($con, "SELECT * from message where `key` = $key") or die(mysqli_error($con));

        if (mysqli_num_rows($query) == 0) {
          echo
            '
              <script>container2.classList.toggle("open");alert("Key tidak ditemukan");</script>
            ';
        } else {

          while ($data = mysqli_fetch_assoc($query)) {
            echo
              '
                <div class="message">' . $data['message'] . '</div>
              ';
          }
        }
      }
      ?>
    </div>
  </div>

  <script>
    let btnClose = document.querySelector('.close');
    let container2 = document.querySelector('.container-2');
    btnClose.addEventListener("click", () => {
      container2.classList.toggle('open');
    })
  </script>
</body>

</html>