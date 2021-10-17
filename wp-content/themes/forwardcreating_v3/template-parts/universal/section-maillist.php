<?php
/**
 * Template part for displaying page section in page templates
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForwardCreating_v3
 */

function mailList_element($element_type=1) {
  switch ($element_type) {
    case 1: ?>
    <div class="bg-color-1">
      <style media="screen">
        .mail-list-bg-image {
          background: url(<?php print get_site_url() ?>/wp-content/uploads/2019/09/mail-list-bg2-forward-creating-sustainable-concept-design.png);
        }
      </style>
      <div class="mail-list-bg-image">
        <section class="a1 mid-email-list-cta container-fluid padding-top-a padding-bottom-a text-center">
          <div class="row">
            <div class="col-md-12 color-0">
              <h4 class="f-weight-b1">JOIN EMAIL LIST</h4>
              <h5 class="f-weight-b1">Short newsletter with the latest in your inbox</h5>
              <span class="mail-list-form margin-top--0">
              <?php
                //TODO: add links to Discord and Telegram server/group (Youtube?!)
                echo do_shortcode('[mc4wp_form id="167"]');     
              ?>
            </span>
            </div>
          </div>
        </section>
      </div>
    </div>
    <?php
    break;
    case 2: ?>
      <section class="a2 mid-email-list-cta container-fluid padding-top-a padding-bottom-a text-center">
        <div class="row">
          <div class="col-md-12 color-0">
            <h3 class="f-weight-b1">JOIN EMAIL LIST</h3>
            <h5 class="f-weight-b1">Short newsletter with the latest in your inbox</h5>
            <?php
              //TODO: add links to Discord and Telegram server/group (Youtube?!)
              echo do_shortcode('[mc4wp_form id="167"]');     
            ?>
          </div>
        </div>
      </section>
      <?php
      break;
    case 3:
      // MailChimp sub/unsub form ?>
      <section class="a3 mid-email-list-cta container-fluid padding-top-a padding-bottom-a text-center">
        <div class="row">
          <div class="col-md-12 color-0">
            <h3 class="f-weight-b1">JOIN EMAIL LIST</h3>
            <h5 class="f-weight-b1">Short newsletter with the latest in your inbox</h5>
            <span class="mail-list-form margin-top--0">
              <?php
              //TODO: add links to Discord and Telegram server/group (Youtube?!)
              echo do_shortcode('[mc4wp_form id="167"]');     
              ?>
            </span>

          </div>
        </div>
      </section>
      <?php
      break;

    default:
    // print "No view to display!";
    break;
  }
}
?>
