<?php
/**
 * Template part for displaying softwaretool custom type post posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForwardCreating_v3
 */



// if no image is attached get the default graphic instead
$image_style_str = 'full';
$image = get_the_post_thumbnail_url(get_the_ID(), $image_style_str);
if(!$image) {
    if($image_style_str == 'full')
        $image = get_template_directory_uri() . "/imgs" . "/default-image.png";
    else
        $image = get_template_directory_uri() . "/imgs" . "/default-image-33.png";
}
?>
<style media="screen"> .fosstool-hero-bg { background-image: url(<?php print $image ?>); } </style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <style>
    
        .fosstool-post-tpl .entry-content a,
        .fosstool-post-tpl .entry-content a:visited{
            color: #1b998b;
        }


        header#header-image h1 { text-align: left }
        header#header-image h1,
        header#header-image h2,
        header#header-image h3,
        header#header-image h4{ 
           color: #fff; 
           text-shadow: 3px 3px 3px rgba(0, 0, 0, 0.6);
        }

        header#header-image img {
            width: 110px;
            padding: 15px;
            background: #fff;
            border-radius: 30px 30px 30px 30px;
            /*filter: grayscale(100%);*/
        }

        div.container5 {
            height: 500px;
            display: flex;
            align-items: center;
            color: #fff
            
        }
        div.container5 div {
            margin: 0 
            color: inherit !important
        }

        .entry-header .grad{
            width: 100%;
            background: rgb(47,39,29);
            background: linear-gradient(90deg, rgba(47,39,29,1) 0%, rgba(153,34,34,0.21612394957983194) 35%, rgba(255,231,0,0) 51%);
        }
        .entry-content h4#license {
            font-size: 46px;
        }
        .entry-content p {
            font-size: 30px;
        }
        .entry-content .sidecol-logo-wrap img{
            width: 70%;
            border: 0px solid #000000;
            border-radius: 30px 30px 30px 30px;
            -moz-border-radius: 30px 30px 30px 30px;
            -webkit-border-radius: 30px 30px 30px 30px;
            /*clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);*/
            -webkit-box-shadow: 35px 14px 0px 21px rgba(0,0,0,0.22);
            -moz-box-shadow: 35px 14px 0px 21px rgba(0,0,0,0.22);
            box-shadow: 35px 14px 0px 21px rgba(0,0,0,0.22);
        }
    </style>

    <!-- intro image on top -->
    <?php $title_post = esc_html(get_the_title()); ?>
	<header class="entry-header container-fluid"> 
        <header id="header-image">
            <div class="row bg-setup-1 fosstool-hero-bg">
                <div class="grad">
                    <div class="container">
                        <div class="row container5">
                            <div class="col-md-12">
                                Presenting:
                                <?php
                                $value_logo = get_field("logo_fosstool");
                                $logo_url_fosstool = get_field("logo_url_fosstool");

                                // We need URL, it's illigal for logo to be with out one in most cases !!!
                                if(!is_null($value_logo) && !is_null($logo_url_fosstool)): ?>
                                <a href="<?php print $logo_url_fosstool; ?>">
                                    <img src="<?php print $value_logo['url'] ?>" alt="<?php print $title_post ?> logo">
                                </a>
                                <?php 
                                endif; ?>
                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="container margin-bot-a">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Industry Domain -->                        
                                <?php
                                $tool_category_fosstool = get_field('tool_category_fosstool');
                                if(!is_null($tool_category_fosstool)): ?>
                                    <h3><?php print $tool_category_fosstool ?></h3>
                                <?php
                                endif; ?>
                                <?php
                                $industry_domain_fosstool = get_field('industry_domain_fosstool');
                                if(!is_null($industry_domain_fosstool)): ?>
                                    <h2>
                                        <?php print $industry_domain_fosstool ?>
                                    </h2>
                                <?php
                                endif; ?>
                            </div>
                            <div class="col-md-4">
                            <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
	</header><!-- .entry-header -->

	<div class="entry-content container margin-top-a">
       
		<div class="row margin-top--0">
			<div  class="col-md-7 order-md-2">
                
            
                <!-- ++ Content -->
                <div class="margin-top-0">
                    <?php
                    the_content( sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'forwardcreating_v3' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ) );

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'forwardcreating_v3' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>

                <!-- ++ Licence -->
                <?php 
                $license_post_obj = get_field('licence_fosstool');
                /*
                ID
                post_content
                post_title
                post_parent
                post_type
                post_status
                post_excerpt
                post_name
                */
                ?>
                <hr/>
                <h4 class="margin-top-0a margin-bot-0a">
                    <a href="<?php echo esc_url( get_permalink($license_post_obj->ID) ); ?>"><?php esc_html_e( $license_post_obj->post_title ); ?></a>
                </h4>


               
			</div>
            <div class="col-md-5 fosstool-gallery-wrap sidecol-logo-wrap order-md-1">
               <!-- tool iamge logo -->
               <img class="margin-top-0a margin-bot-0a" src="<?php print $value_logo['url'] ?>" alt="<?php print $title_post ?> logo">
            </div>
		</div>



        <div class="row margin-top-0">
            <div class="col-md-12">
             <?php
                $manadgment_profile_fosstool =  get_field('manadgment_profile_fosstool');
                $founder_fosstool = $manadgment_profile_fosstool['founder_fosstool'];
                $founder_website_fosstool = $manadgment_profile_fosstool['founder_website_fosstool'];
                $founder_wiki_fosstool = $manadgment_profile_fosstool['founder_wiki_fosstool'];
                $donations_link_fosstool = $manadgment_profile_fosstool['donations_link_fosstool'];
                if(!is_null($founder_fosstool) && !is_null($founder_website_fosstool) && !is_null($founder_wiki_fosstool)  && !is_null($donations_link_fosstool)): ?>
                <div class="">
                    <img src="" alt="" width="200px" height="200px">
                    <div>
                        <h3>Managed by <a target="_blank" href="<?php print $founder_website_fosstool ?>"><?php print $founder_fosstool ?></a></h3>
                        <p>BLENDER FOUNDATION <a target="_blank" href="<?php print $founder_wiki_fosstool ?>">Wiki</a></p>
                        <p>You wish to <a target="_blank" href="<?php print $donations_link_fosstool ?>">Donate/Contribute? <i class="fas fa-hand-holding-heart" aria-hidden="true"></i></a></p>
                    </div>
                </div>
                <?php
                endif; ?>
            </div>
            <!-- <div class="col-md-6"> -->
                <!-- found. image logo -->
            <!-- </div> -->
        </div>
	</div><!-- .entry-content -->


   <!-- Images Slider -->
     <style>

        img {
            max-width: 100%;
            vertical-align: middle;
        }

        .trigger {
          display: none;
        }

        .slider, .slider-wrapper {
            position: relative;
            height: 250px;
        }

        .slide {
            background-color: black;
            width: 100%;
            overflow: hidden;
            position: absolute;
            height: 100%;
            left: 0;
            top: 0;
            z-index: 5000;
            opacity: 0;
            transition: opacity .5s ease-in-out;
        }

        .slide-img {
            filter: brightness(100%);
            height: 100%;
            object-fit: fill;
            display: block;
            margin: 0 auto;
        }

        .slide-figure {
            height: 100%;
            position: relative;
            margin: 0;
        }

        .slide-caption {
            position: absolute;
            left: 0%;
            bottom: 15%;
            width: fit-content; /*calc(40% - 1rem);*/
            margin: 0px 40px;
            padding: 30px 40px;
            text-align: left;
            color: white;
            background: #21252961;
            border-radius: 16px;
        }

        .trigger:checked + .slide {
            z-index: 6000;
            opacity: 1;
        }

        .slider-nav {
            width: 100%;
            text-align: center;
            margin: 1rem 0;
            position: relative;
            top: -80px;
            z-index: 6000;
        }

        .slider-nav__item {
         display: inline-block;
        }

        .slider-nav__label {
            font-size: 13px;
            background-color: #25998b;
            display: block;
            width: 18px;
            height: 18px;
            margin: 5px;
            line-height: 2em;
            text-align: center;
            border-radius: 25%;
            color: white;
            cursor: pointer;
            transition: background-color .25s, color .25s ease-in-out;
        }

        .slider-nav__label:hover {
            background-color: #d7263d;
            color: #FFF;
        }
        .slider-nav__label:focus,
        .slider-nav__label:active { 
            opacity: 0.6;
        }
        .slider-nav__label.active-slide-ui { 
            background-color: #FFF; 
            opacity: 1;
        }

        @media only screen and (min-width: 1440px) {
            .slide-img {
                width: 100%;
                height: auto;
            }
            .slider, .slider-wrapper {
                height: 640px;
            }

            .slide-caption {
                width: fit-content;
                font-size: 1.5rem;
            } 
        }

        @media only screen and (max-width: 1439px) and (min-width: 1024px) {
            
            .slide-img {
                width: 100%;
                height: auto;
            }

            .slider, .slider-wrapper {
                height: 480px;
            }

            .slide-caption {

                position: absolute; 
                bottom: 18%;
                margin: 0px 40px 0px 40px; 
                padding: 10px 40px;
            } 
        }

        @media only screen and (max-width: 1023px) and (min-width: 768px) {
            .slide-img {
                width: 100%;
                height: auto;
            }

            .slider, .slider-wrapper { 
                height: 380px;
            }

            .slide-caption {
                font-size: 1.25rem;
                bottom: 21%;
                padding: 10px 40px;
            }
        }

        @media only screen and (max-width: 767px)  and (min-width: 360px) {
            .slide-img {
                width: 100%;
                height: auto;
            }

            .slide-caption {
                font-size: 1.25rem;
                bottom: 32%;
                padding: 10px 30px;
                width: 100%;
                margin: 0px 0px;
                text-align: center;
                border-radius: none;
            }
            .slider-nav {
                text-align: center;
                margin: 0px;
                padding: 8px;
            }
        }

        @media only screen and (max-width: 359px) {
            .slide-caption {
                bottom: 28%;
                width: 100%;
                margin: 0px 0px;
                padding: 0px 20px 10px 20px;
                text-align: center;
                border-radius: none;
            }

            .slider-nav {
                text-align: center;
                margin: 0px;
                padding: 8px;
            }
            .slider-nav__label {
                width: 16px;
                height: 16px;
                margin: 4px;
                margin-top: 10px;
            }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            /* on click make active one styled to show that */
            [].forEach.call( document.querySelectorAll('.slider-nav__label'), function(el) {
                // add listener to iterated elements with class '.slider-nav__label'
                el.addEventListener('click', function() {
                    // reset all
                    [].forEach.call(document.querySelectorAll('.slider-nav__label'), function(els) { els.classList.remove('active-slide-ui'); });
                    // make cliked active
                    this.classList.add('active-slide-ui');
                }, false);
            }, false);

        });
    </script>
    <?php
    $gallery_fosstool = get_field('gallery_fosstool');
    $size = 'medium'; // full, thumbnail, medium
    ?>
    <div class="container-fluid margin-top-a1 box-shadow1 remove-container-padding">
        <div class="row">
            <div class="col-md-12">


                 <div class="slider-wrapper">
                    <div class="slider">
                    <?php
       
                    foreach($gallery_fosstool as $key => $image): ?>
                        <input type="radio" name="slider" class="trigger" id="one_<?php print $key ?>" <?php print ($key == 0) ? 'checked="checked"' : ''; ?> />
                        <div class="slide">
                            <figure class="slide-figure">
                                <img class="slide-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php print esc_attr($image['alt']); ?>" />
                                <figcaption class="slide-caption box-shadow1"><p><?php print esc_attr($image['alt']); ?></p></figcaption>
                            </figure><!-- .slide-figure -->
                        </div><!-- .slide -->
                    <?php
                    endforeach; ?>   
                    </div><!-- .slider -->
                    <ul class="slider-nav">
                    <?php
                    foreach($gallery_fosstool as $key => $image): ?>
                        <li class="slider-nav__item"><label class="slider-nav__label <?php print ($key == 0) ? 'active-slide-ui' : ''; ?>" for="one_<?php print $key ?>"><?php //print $key ?></label></li>
                    <?php
                    endforeach; ?>
                    </ul><!-- .slider-nav -->
                </div><!-- .slider-wrapper -->


            </div>
        </div>
    </div>


   <!-- Linked FossTools -->
    <style>
        .col-tool-box {
            float: left;
            display: block;
            height: 150px;
            margin: 0px;
            margin-bottom: 62px;
            padding: 0px;
        }
        .col-tool-box div.div-wrap-svg {
            display: block;
            margin: auto;
            width: 4px;
            height: 67px;
        }

        svg.etst {
            position: absolute;
            top: 147px;
            /* margin-left: calc(50% - 16px); */
        }
        .col-tools {
            
        }
        .etst.hide { 
            display: none
        }
        .tool-img-wrap {
            width: 60%;
            height: 150px;
            display: block;
            margin: auto;
            text-align: center;
            border: 4px solid #d7263d;
            border-radius: 20px 20px 20px 20px;
            -moz-border-radius: 20px 20px 20px 20px;
            -webkit-border-radius: 20px 20px 20px 20px;
        }
        
        .tool-img-wrap .tool-img {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 50%;
            transform: translate(-50%, -50%);
        }
 
    </style>
    <div class="container margin-top-a1">
        <div class="row">
            <div class="col-md-12">
                <h4>Other Tools You Might be Interested In</h4>
                <div class="margin-top-0">
                <?php
                $rrr = array(0,1,2,3,4,6,7,8);
                $countA = count($rrr);
                foreach ($rrr as $key => $a):
                    reset($rrr);
                    if ($key === key($rrr)): ?>
                        <div class="row col-tools">
                    <?php    
                    endif;
                    
                    if($key%4==0 && $key!==0): ?>
                        </div>
                        <div class="row col-tools">
                            <?php    
                    endif; ?>
                    <div class="col-md-3 col-tool-box">
                        <div class="tool-img-wrap">
                            <img class="tool-img" src="<?php print $value_logo['url'] ?>" alt="<?php print $title_post ?> logo">
                        </div>
                        <div class="div-wrap-svg">
                            <svg class="etst <?php print ($key+4 >= $countA) ? "hide" : ""; ?>" height="150" width="8">
                                <line x1="2" y1="0" x2="2" y2="65" style="stroke:#d7263d; stroke-width:4;"></line>
                                <!-- <circle cx="10" cy="10" r="8" stroke="#d7263d" stroke-width="2" fill="#d7263d" /> -->
                                No support for SVG.
                            </svg>
                        </div>
                    </div>
                    <?php
                    end($rrr);
                    if ($key === key($rrr)): ?>
                        </div>
                    <?php    
                    endif; 
                endforeach;  ?>
                </div>
            </div>
        </div>
    </div>





	<footer class="entry-footer container margin-top--0">
		<div class="row">
			<div  class="col-md-12">
				<?php forwardcreating_v3_entry_footer(); ?>
			</div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
