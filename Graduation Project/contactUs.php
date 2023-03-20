<?php
include_once "class/Notification.class.php";
$noti = new Notification();
@session_start();
if(isset($_POST['submit']) && isset($_SESSION['id'])){
 $noti->store($_POST);
}

?>
<?php $pageTitle = "Contact us"?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Countact Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Jomhuria&family=Open+Sans:wght@300&family=Roboto:wght@100;300;500&display=swap"
      rel="stylesheet"
    />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/dorms.css" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/slider.css" />

    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>

  </head>
  <body>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <!-- start navbar -->

    <?php include "navbar-footer/navbar.php"; ?>

    <!-- end navbar -->
    <div class="contact-us mt-5 mb-5">
      <div class="container">
        <div class="spical-heder text-center">
          <h2 class="fw-bold mb-5">For inquiries and notes</h2>
           <!-- response success message sent  -->
         <?php 
            if(isset($_GET['sm'])){
              ?>
              <div class="alert alert-success" role="alert">
                <?php echo $_GET['sm']; ?>
              </div>
            <?php } ?> 
          <form method="post" action=''>
          <div class="row mb-3">
          <div class="col-sm-2"></div>


          <div class="col-sm-10">
          <select name="isInternational" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                              <option value="1">Choose Dorm</option>
                               <option value="1">Ammon</option>
                               <option value="1">Jerash</option>
                               <option value="0">Al-Andalus	</option>
                               <option value="0">Al-Zahraa</option>
          </select>
          </div>
          </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea
                  class="form-control"
                  id="contact-us"
                  name="message"
                  cols="40"
                  rows="5"
                  required
                >
                </textarea>
              </div>
            </div>
           
            <input type="hidden" name="id" value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id'];?>">
            
            
            <?php if(isset($_SESSION['id'])){ ?>
            <button type="submit" class="btn btn-primary" name="submit">Send</button>
            <?php }else{ ?>
            <button type="submit" class="btn btn-danger" disabled data-bs-toggle="button" autocomplete="off" name="submit">Send</button>
           <?php }?>
          </form>
        </div>
      </div>
    </div>
    <br><br><br><br><br>
    <!-- start footer -->
      <?php include "navbar-footer/footer.php"; ?>

        <!-- end footer -->
        <script>

        CKEDITOR.ClassicEditor.create(document.getElementById('contact-us'), {
      			uiColor: '#CCEAEE',
                toolbar: {
                  items: [
                      'exportPDF','exportWord', '|',
                      'findAndReplace', 'selectAll', '|',
                      'heading', '|',
                      'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                      'bulletedList', 'numberedList', 'todoList', '|',
                      'outdent', 'indent', '|',
                      'undo', 'redo',
                      '-',
                      'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                      'alignment', '|',
                      'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                      'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                      'textPartLanguage', '|',
                      'sourceEditing'
                  ],
                  shouldNotGroupWhenFull: true
              },
              list: {
                  properties: {
                      styles: true,
                      startIndex: true,
                      reversed: true
                  }
              },
              heading: {
                  options: [
                      { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                      { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                      { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                      { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                      { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                      { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                      { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                  ]
              },
              fontFamily: {
                  options: [
                      'default',
                      'Arial, Helvetica, sans-serif',
                      'Courier New, Courier, monospace',
                      'Georgia, serif',
                      'Lucida Sans Unicode, Lucida Grande, sans-serif',
                      'Tahoma, Geneva, sans-serif',
                      'Times New Roman, Times, serif',
                      'Trebuchet MS, Helvetica, sans-serif',
                      'Verdana, Geneva, sans-serif'
                  ],
                  supportAllValues: true
              },
              fontSize: {
                  options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                  supportAllValues: true
              },
              htmlSupport: {
                  allow: [
                      {
                          name: /.*/,
                          attributes: true,
                          classes: true,
                          styles: true
                      }
                  ]
              },
              htmlEmbed: {
                  showPreviews: true
              },
              link: {
                  decorators: {
                      addTargetToExternalLinks: true,
                      defaultProtocol: 'https://',
                      toggleDownloadable: {
                          mode: 'manual',
                          label: 'Downloadable',
                          attributes: {
                              download: 'file'
                          }
                      }
                  }
              },
              mention: {
                  feeds: [
                      {
                          marker: '@',
                          feed: [
                              '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                              '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                              '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                              '@sugar', '@sweet', '@topping', '@wafer'
                          ],
                          minimumCharacters: 1
                      }
                  ]
              },
              removePlugins: [
                  'CKBox',
                  'RealTimeCollaborativeComments',
                  'RealTimeCollaborativeTrackChanges',
                  'RealTimeCollaborativeRevisionHistory',
                  'PresenceList',
                  'Comments',
                  'TrackChanges',
                  'TrackChangesData',
                  'RevisionHistory',
                  'Pagination',
                  'WProofreader',
                  'MathType'
              ]
          });

  </script>
  </body>
</html>
