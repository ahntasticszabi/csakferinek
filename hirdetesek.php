<?php

  //Ha nincs belépve, ezt írja ki
  if(!$belepve) die("<h2></h2>");

  /* Képek lekérdezése */
  $kepek = mysqli_query( $adb , "
      SELECT * 
      FROM   **ahol a hírdetések vannak**
      ORDER BY **hírdetések dátuma szerint**
  " ) ;

  print "<div class='container'>";
  while( $hsor = mysqli_fetch_assoc( $kepek ) )
  {
    print "
    <div class='gallery'> 
      <a href='./?p=post&k=$hsor[ppicture]&c=$hsor[pid]'>
        <img src='./***mappád neve ahova a leméretezett indexkép kerül***/$hsor[ppicture]'>
      </a>
    </div>
    ";
  }
  print "<div style='clear:both;'>
        </div>
        </div>";
?>