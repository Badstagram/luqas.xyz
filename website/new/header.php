<html>
 <header>
  <nav>
    <ul>
     <li><a href="index">Startseite</a></li>
     <li><a href="server">Server</a></li>
     <li><a href="team">Team</a></li>
     <p id="uhr" ></p>
    </ul>
  </nav>
 </header>
    <script lang="javascript">
                 function uhrzeit() {
                  var jetzt = new Date(),
                  h = jetzt.getHours(),
                  m = jetzt.getMinutes(),
                  s = jetzt.getSeconds();
                  m = fuehrendeNull(m);
                  s = fuehrendeNull(s);
                  document.getElementById('uhr').innerHTML = h + ':' + m + ':' + s;
                  setTimeout(uhrzeit, 500);
                 }
  
                 function fuehrendeNull(zahl) {
                  zahl = (zahl < 10 ? '0' : '' )+ zahl;  
                  return zahl;
                 }
        </script>
</html>