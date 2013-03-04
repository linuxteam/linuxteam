<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Καλώς ήρθατε στο „<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>“ 

<?php echo (isset($this->_rootref['WELCOME_MSG'])) ? $this->_rootref['WELCOME_MSG'] : ''; ?>


Παρακαλούμε κρατήστε αυτό το μήνυμα στο αρχείο σας. Οι λεπτομέρειες του λογαριασμού σας είναι οι:

----------------------------
Όνομα μέλους: <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>



Ιστοσελίδας σύνδεσμος: <?php echo (isset($this->_rootref['U_BOARD'])) ? $this->_rootref['U_BOARD'] : ''; ?>

----------------------------

Ο κωδικός πρόσβασης έχει αποθυκευτεί κρυπτογραφημένος στην βάση μας και δεν μπορεί να ανακτηθεί. Αν τον ξεχάσετε μπορείτε να ζητήσετε νέον κωδικό που θα ενεργοποιηθεί με τον ίδιο τρόπο σε αυτόν τον λογαριασμό.


Ευχαριστούμε για την εγγραφή σας.

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>