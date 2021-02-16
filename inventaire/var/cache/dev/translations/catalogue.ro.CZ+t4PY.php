<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('ro', array (
  'validators' => 
  array (
    'This form should not contain extra fields.' => 'Acest formular nu ar trebui să conțină câmpuri suplimentare.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Fișierul încărcat a fost prea mare. Vă rugăm sa încărcați un fișier mai mic.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'Token-ul CSRF este invalid. Vă rugăm să retrimiteți formularul.',
    'This value is not a valid HTML5 color.' => 'Această valoare nu este un cod de culoare HTML5 valid.',
    'Please enter a valid birthdate.' => 'Vă rugăm să introduceți o dată de naștere validă.',
    'The selected choice is invalid.' => 'Valoarea selectată este invalidă.',
    'The collection is invalid.' => 'Colecția nu este validă.',
    'Please select a valid color.' => 'Vă rugăm să selectați o culoare validă.',
    'Please select a valid country.' => 'Vă rugăm să selectați o țară validă.',
    'Please select a valid currency.' => 'Vă rugăm să selectați o monedă validă.',
    'Please choose a valid date interval.' => 'Vă rugăm să selectați un interval de zile valid.',
    'Please enter a valid date and time.' => 'Vă rugăm să introduceți o dată și o oră validă.',
    'Please enter a valid date.' => 'Vă rugăm să introduceți o dată validă.',
    'Please select a valid file.' => 'Vă rugăm să selectați un fișier valid.',
    'The hidden field is invalid.' => 'Câmpul ascuns este invalid.',
    'Please enter an integer.' => 'Vă rugăm să introduceți un număr întreg.',
    'Please select a valid language.' => 'Vă rugăm să selectați o limbă validă.',
    'Please select a valid locale.' => 'Vă rugăm să selectați o setare locală validă.',
    'Please enter a valid money amount.' => 'Vă rugăm să introduceți o valoare monetară corectă.',
    'Please enter a number.' => 'Vă rugăm să introduceți un număr.',
    'The password is invalid.' => 'Parola nu este validă.',
    'Please enter a percentage value.' => 'Vă rugăm să introduceți o valoare procentuală.',
    'The values do not match.' => 'Valorile nu coincid.',
    'Please enter a valid time.' => 'Vă rugăm să introduceți o oră validă.',
    'Please select a valid timezone.' => 'Vă rugăm să selectați un fus orar valid.',
    'Please enter a valid URL.' => 'Vă rugăm să introduceți un URL valid.',
    'Please enter a valid search term.' => 'Vă rugăm să introduceți un termen de căutare valid.',
    'Please provide a valid phone number.' => 'Vă rugăm să introduceți un număr de telefon valid.',
    'The checkbox has an invalid value.' => 'Bifa nu are o valoare validă.',
    'Please enter a valid email address.' => 'Vă rugăm să introduceți o adresă de email validă.',
    'Please select a valid option.' => 'Vă rugăm să selectați o opțiune validă.',
    'Please select a valid range.' => 'Vă rugăm să selectați un interval valid.',
    'Please enter a valid week.' => 'Vă rugăm să introduceți o săptămână validă.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'A apărut o eroare de autentificare.',
    'Authentication credentials could not be found.' => 'Informațiile de autentificare nu au fost găsite.',
    'Authentication request could not be processed due to a system problem.' => 'Sistemul nu a putut procesa cererea de autentificare din cauza unei erori.',
    'Invalid credentials.' => 'Date de autentificare invalide.',
    'Cookie has already been used by someone else.' => 'Cookieul este folosit deja de altcineva.',
    'Not privileged to request the resource.' => 'Permisiuni insuficiente pentru resursa cerută.',
    'Invalid CSRF token.' => 'Tokenul CSRF este invalid.',
    'No authentication provider found to support the authentication token.' => 'Nu a fost găsit nici un agent de autentificare pentru tokenul specificat.',
    'No session available, it either timed out or cookies are not enabled.' => 'Sesiunea nu mai este disponibilă, a expirat sau suportul pentru cookieuri nu este activat.',
    'No token could be found.' => 'Tokenul nu a putut fi găsit.',
    'Username could not be found.' => 'Numele de utilizator nu a fost găsit.',
    'Account has expired.' => 'Contul a expirat.',
    'Credentials have expired.' => 'Datele de autentificare au expirat.',
    'Account is disabled.' => 'Contul este dezactivat.',
    'Account is locked.' => 'Contul este blocat.',
    'Too many failed login attempts, please try again later.' => 'Prea multe încercări de autentificare eșuate, vă rugăm să încercați mai târziu.',
    'Invalid or expired login link.' => 'Link de autentificare invalid sau expirat.',
  ),
  'EasyAdminBundle' => 
  array (
    'page_title.detail' => '%entity_label_singular% <small>(#%entity_short_id%)</small>',
    'page_title.edit' => 'Editează %entity_label_singular% <small>(#%entity_short_id%)</small>',
    'page_title.index' => '%entity_label_plural%',
    'page_title.new' => 'Creează %entity_label_singular%',
    'page_title.exception' => 'Eroare|Erori',
    'datagrid.no_results' => 'Niciun rezultat.',
    'paginator.first' => 'Prima',
    'paginator.previous' => 'Anterior',
    'paginator.next' => 'Următor',
    'paginator.last' => 'Ultima',
    'paginator.counter' => '<strong>%start%</strong> - <strong>%end%</strong> din <strong>%results%</strong>',
    'label.true' => 'Da',
    'label.false' => 'Nu',
    'label.empty' => 'Gol',
    'label.null' => 'Nul',
    'label.nullable_field' => 'Pastreaza necompletat',
    'label.object' => 'Obiect PHP',
    'label.inaccessible' => 'Inaccesibil',
    'label.inaccessible.explanation' => 'Metoda de tip Get nu există pentru acest câmp sau proprietatea nu e publică',
    'label.form.empty_value' => 'Gol',
    'action.entity_actions' => 'Acțiuni',
    'action.new' => 'Adaugă %entity_label_singular%',
    'action.search' => 'Caută',
    'action.detail' => 'Vezi',
    'action.edit' => 'Editează',
    'action.delete' => 'Șterge',
    'action.cancel' => 'Anulează',
    'action.index' => 'Înapoi la listă',
    'action.add_new_item' => 'Adaugă un item nou',
    'action.remove_item' => 'Șterge un item',
    'action.choose_file' => 'Alege fișierul',
    'delete_modal.title' => 'Ești sigur că vrei să ștergi acest item?',
    'delete_modal.content' => 'Nu există posibilitatea de a reveni asupra acestei decizii.',
    'user.logged_in_as' => 'Înregistrat ca',
    'user.sign_out' => 'Deconectați-vă',
    'login_page.username' => 'Utilizator',
    'login_page.password' => 'Parolă',
    'login_page.sign_in' => 'Autentifică-te',
  ),
));

$catalogueEn = new MessageCatalogue('en', array (
  'validators' => 
  array (
    'This form should not contain extra fields.' => 'This form should not contain extra fields.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'The uploaded file was too large. Please try to upload a smaller file.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'The CSRF token is invalid. Please try to resubmit the form.',
    'This value is not a valid HTML5 color.' => 'This value is not a valid HTML5 color.',
    'Please enter a valid birthdate.' => 'Please enter a valid birthdate.',
    'The selected choice is invalid.' => 'The selected choice is invalid.',
    'The collection is invalid.' => 'The collection is invalid.',
    'Please select a valid color.' => 'Please select a valid color.',
    'Please select a valid country.' => 'Please select a valid country.',
    'Please select a valid currency.' => 'Please select a valid currency.',
    'Please choose a valid date interval.' => 'Please choose a valid date interval.',
    'Please enter a valid date and time.' => 'Please enter a valid date and time.',
    'Please enter a valid date.' => 'Please enter a valid date.',
    'Please select a valid file.' => 'Please select a valid file.',
    'The hidden field is invalid.' => 'The hidden field is invalid.',
    'Please enter an integer.' => 'Please enter an integer.',
    'Please select a valid language.' => 'Please select a valid language.',
    'Please select a valid locale.' => 'Please select a valid locale.',
    'Please enter a valid money amount.' => 'Please enter a valid money amount.',
    'Please enter a number.' => 'Please enter a number.',
    'The password is invalid.' => 'The password is invalid.',
    'Please enter a percentage value.' => 'Please enter a percentage value.',
    'The values do not match.' => 'The values do not match.',
    'Please enter a valid time.' => 'Please enter a valid time.',
    'Please select a valid timezone.' => 'Please select a valid timezone.',
    'Please enter a valid URL.' => 'Please enter a valid URL.',
    'Please enter a valid search term.' => 'Please enter a valid search term.',
    'Please provide a valid phone number.' => 'Please provide a valid phone number.',
    'The checkbox has an invalid value.' => 'The checkbox has an invalid value.',
    'Please enter a valid email address.' => 'Please enter a valid email address.',
    'Please select a valid option.' => 'Please select a valid option.',
    'Please select a valid range.' => 'Please select a valid range.',
    'Please enter a valid week.' => 'Please enter a valid week.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'An authentication exception occurred.',
    'Authentication credentials could not be found.' => 'Authentication credentials could not be found.',
    'Authentication request could not be processed due to a system problem.' => 'Authentication request could not be processed due to a system problem.',
    'Invalid credentials.' => 'Invalid credentials.',
    'Cookie has already been used by someone else.' => 'Cookie has already been used by someone else.',
    'Not privileged to request the resource.' => 'Not privileged to request the resource.',
    'Invalid CSRF token.' => 'Invalid CSRF token.',
    'No authentication provider found to support the authentication token.' => 'No authentication provider found to support the authentication token.',
    'No session available, it either timed out or cookies are not enabled.' => 'No session available, it either timed out or cookies are not enabled.',
    'No token could be found.' => 'No token could be found.',
    'Username could not be found.' => 'Username could not be found.',
    'Account has expired.' => 'Account has expired.',
    'Credentials have expired.' => 'Credentials have expired.',
    'Account is disabled.' => 'Account is disabled.',
    'Account is locked.' => 'Account is locked.',
    'Too many failed login attempts, please try again later.' => 'Too many failed login attempts, please try again later.',
    'Invalid or expired login link.' => 'Invalid or expired login link.',
  ),
  'EasyAdminBundle' => 
  array (
    'page_title.dashboard' => 'Dashboard',
    'page_title.detail' => '%entity_label_singular% <small>(#%entity_short_id%)</small>',
    'page_title.edit' => 'Edit %entity_label_singular% <small>(#%entity_short_id%)</small>',
    'page_title.index' => '%entity_label_plural%',
    'page_title.new' => 'Create %entity_label_singular%',
    'page_title.exception' => 'Error|Errors',
    'datagrid.hidden_results' => 'Some results can\'t be displayed because you don\'t have enough permissions',
    'datagrid.no_results' => 'No results found.',
    'paginator.first' => 'First',
    'paginator.previous' => 'Previous',
    'paginator.next' => 'Next',
    'paginator.last' => 'Last',
    'paginator.counter' => '<strong>%start%</strong> - <strong>%end%</strong> of <strong>%results%</strong>',
    'paginator.results' => '{0} No results|{1} <strong>1</strong> result|]1,Inf] <strong>%count%</strong> results',
    'label.true' => 'Yes',
    'label.false' => 'No',
    'label.empty' => 'Empty',
    'label.null' => 'Null',
    'label.nullable_field' => 'Leave empty',
    'label.object' => 'PHP Object',
    'label.inaccessible' => 'Inaccessible',
    'label.inaccessible.explanation' => 'Getter method does not exist for this field or the field is not public',
    'label.form.empty_value' => 'None',
    'field.code_editor.view_code' => 'View code',
    'field.text_editor.view_content' => 'View content',
    'action.entity_actions' => 'Actions',
    'action.new' => 'Add %entity_label_singular%',
    'action.search' => 'Search',
    'action.detail' => 'Show',
    'action.edit' => 'Edit',
    'action.delete' => 'Delete',
    'action.cancel' => 'Cancel',
    'action.index' => 'Back to listing',
    'action.deselect' => 'Deselect',
    'action.add_new_item' => 'Add a new item',
    'action.remove_item' => 'Remove the item',
    'action.choose_file' => 'Choose file',
    'action.close' => 'Close',
    'action.create' => 'Create',
    'action.create_and_add_another' => 'Create and add another',
    'action.create_and_continue' => 'Create and continue editing',
    'action.save' => 'Save changes',
    'action.save_and_continue' => 'Save and continue editing',
    'batch_action_modal.title' => 'Do you really want to alter the selected items?',
    'batch_action_modal.content' => 'There is no undo for this operation.',
    'batch_action_modal.action' => 'Proceed',
    'delete_modal.title' => 'Do you really want to delete this item?',
    'delete_modal.content' => 'There is no undo for this operation.',
    'filter.title' => 'Filters',
    'filter.button.clear' => 'Clear',
    'filter.button.apply' => 'Apply',
    'filter.label.is_equal_to' => 'is equal to',
    'filter.label.is_not_equal_to' => 'is not equal to',
    'filter.label.is_greater_than' => 'is greater than',
    'filter.label.is_greater_than_or_equal_to' => 'is greater than or equal to',
    'filter.label.is_less_than' => 'is less than',
    'filter.label.is_less_than_or_equal_to' => 'is less than or equal to',
    'filter.label.is_between' => 'is between',
    'filter.label.contains' => 'contains',
    'filter.label.not_contains' => 'doesn\'t contain',
    'filter.label.starts_with' => 'starts with',
    'filter.label.ends_with' => 'ends with',
    'filter.label.exactly' => 'exactly',
    'filter.label.not_exactly' => 'not exactly',
    'filter.label.is_same' => 'is same',
    'filter.label.is_not_same' => 'is not same',
    'filter.label.is_after' => 'is after',
    'filter.label.is_after_or_same' => 'is after or same',
    'filter.label.is_before' => 'is before',
    'filter.label.is_before_or_same' => 'is before or same',
    'form.are_you_sure' => 'You haven\'t saved the changes made on this form.',
    'form.tab.error_badge_title' => 'One invalid input|%count% invalid inputs',
    'form.slug.confirm_text' => 'If you change the slug, you can break links on other pages.',
    'user.logged_in_as' => 'Logged in as',
    'user.unnamed' => 'Unnamed User',
    'user.anonymous' => 'Anonymous User',
    'user.sign_out' => 'Sign out',
    'user.exit_impersonation' => 'Exit impersonation',
    'login_page.username' => 'Username',
    'login_page.password' => 'Password',
    'login_page.sign_in' => 'Sign in',
    'exception.entity_not_found' => 'This item is no longer available.',
    'exception.entity_remove' => 'This item can\'t be deleted because other items depend on it.',
    'exception.forbidden_action' => 'The requested action can\'t be performed on this item.',
    'exception.insufficient_entity_permission' => 'You don\'t have permission to access this item.',
  ),
));
$catalogue->addFallbackCatalogue($catalogueEn);

return $catalogue;
