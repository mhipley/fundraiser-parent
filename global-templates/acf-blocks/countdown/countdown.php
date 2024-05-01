<div class="countdown-block">
<div class="countdown-wrap">

    <div class="countdown-title">
        Countdown title
    </div>
<?php $unixtimestamp = strtotime( get_field('end_date') ); ?>
<div id="clockdiv" time-till-end="<?php echo $unixtimestamp;?>">
  <div class="countdown-field">
    <span class="days"></span>
    <div class="countdown-smalltext">Days</div>
  </div>
  <div class="countdown-field">
    <span class="hours"></span>
    <div class="countdown-smalltext">Hours</div>
  </div>
  <div class="countdown-field">
    <span class="minutes"></span>
    <div class="countdown-smalltext">Minutes</div>
  </div>
  <div class="countdown-field">
    <span class="seconds"></span>
    <div class="countdown-smalltext">Seconds</div>
  </div>
  <br>
</div>




</div>
    </div>