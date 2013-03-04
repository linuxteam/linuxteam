<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Ένα νέο προσωπικό μήνυμα αφίχθη

Γεια σας <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>,

Έχετε λάβει ένα νέο προσωπικό μήνυμα από τον "<?php echo (isset($this->_rootref['AUTHOR_NAME'])) ? $this->_rootref['AUTHOR_NAME'] : ''; ?>" στο λογαριασμό σας του "<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>" με το ακόλουθο θέμα:

<?php echo (isset($this->_rootref['SUBJECT'])) ? $this->_rootref['SUBJECT'] : ''; ?>


Μπορείτε να διαβάσετε το μήνυμα σας  ακολουθώντας τον παρακάτω σύνδεσμο:

<?php echo (isset($this->_rootref['U_VIEW_MESSAGE'])) ? $this->_rootref['U_VIEW_MESSAGE'] : ''; ?>


Έχετε επιλέξει να ειδοποιήστε για κάθε εισερχόμενο μήνυμα, να θυμάστε πως μπορείτε να απενεργοποιήσετε την λειτουργία της ειδοποίησης, αλλάζοντας την κατάλληλη ρύθμιση στο προφίλ σας.

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>