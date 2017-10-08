      <?php include ("config.php"); ?>


<!-- HEADER -->

      <?php include("header.php"); ?>
      
<!-- MAIN COLUMN -->

      <div id="bodycontent">
        <div id="columnswrapper">
          <div id="maincolumn">
              <form action="mail.php" method="POST" id="contactmail">
                <p>Name</p> <input type="text" name="name">
                <p>Email</p> <input type="text" name="email">
                <p>Message</p><textarea name="message" rows="6" cols="25"></textarea><br />
                <input type="submit" value="Send"><input type="reset" value="Clear">
              </form>
        </div>
      </div>

<!-- SIDE COLUMN -->

      <div id="sidecolumn">
          <h3>
            Any questions?
          </h3>
          <h4 id="address">
            Corresponding address
          </h4>
          <p>
            Östra Storgatan 24<br>63 783 Jönköping
          </p>
          <h4 id="address">
            Telephone
          </h4>
          <p>
            +46 (0) 703 993 234
          </p>
          <h3 id="better">
            Let us be even better! Tell us what you think about our website and suggest some new solutions and ideas!
          </h3>
      </div>
        </div>

<!-- FOOTER -->

    <?php include("footer.php"); ?>
      </div>
      </div>
    </body>
</html>
