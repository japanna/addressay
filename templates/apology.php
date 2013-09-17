    <!-----------------------------------------------------------------------------
     - apology.php
     -
     - Computer Science 50
     - From Problem Set 7, 2012
     -
     - Generates message for apology function.
     - Implements "back" link.
     ----------------------------------------------------------------------------->
<div id="apology">
<p class="lead text-error">
    Sorry!
</p>
<p class="text-error">
    <?= htmlspecialchars($message) ?>
</p>

<a href="javascript:history.go(-1);">Back</a>
</div>
