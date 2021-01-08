<hr>
<div class="subject">
  <label for="Dia"></label>
  <select placeholder="Dia" name="dia[]" id="dia" required>
    <option disabled hidden selected>Dia</option>
    <?php
    $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
      $result = mysqli_query($base, 
      "Select * from dias");
      while($res = mysqli_fetch_assoc($result)){
    ?>
    <option value="<?php echo $res["id_dia"]?>">
      <?php 
        echo $res["dia"];
      ?>
    </option>
    <?php
      }
    ?>
    </select>
</div>

<div class="subject">
  <label for="Hora"></label>
  <select placeholder="Hora" name="Hora[]" id="Hora" required>
    <option disabled hidden selected>Hora</option>
    <?php
      $result = mysqli_query($base, 
      "Select * from horario");
      while($res = mysqli_fetch_assoc($result)){
    ?>
    <option value="<?php echo $res["id_horario"]?>">
      <?php 
        echo $res["horario_entrada"].' - '.$res["horario_salida"];
      ?>
    </option>
    <?php
      }
    ?>
    </select>
</div>