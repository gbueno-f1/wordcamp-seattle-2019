<?php


namespace ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Controllers;


class HelloDollyController
{
    public static $lyrics;

    public function __construct()
    {
        /** These are the lyrics to Hello Dolly */
        self::$lyrics = <<< LYRICS
Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
I feel the room swayin'
While the band's playin'
One of our old favorite songs from way back when
So, take her wrap, fellas
Dolly, never go away again
Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
I feel the room swayin'
While the band's playin'
One of our old favorite songs from way back when
So, golly, gee, fellas
Have a little faith in me, fellas
Dolly, never go away
Promise, you'll never go away
Dolly'll never go away again
LYRICS;

    }

    public static function init() {
        add_action( 'admin_notices', array( __CLASS__, 'helloDolly' ) );
        add_action( 'admin_head', array( __CLASS__, 'dollyCss') );
    }

    public static function getLyric() {

        // Here we split it into lines.
        $lyrics = explode( "\n", self::$lyrics );

        // And then randomly choose a line.
        return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
    }

    public static function helloDolly() {
        $chosen = self::getLyric();
        $lang   = '';
        if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
            $lang = ' lang="en"';
        }

        printf(
            '<p id="dolly"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
            __( 'Quote from Hello Dolly song, by Jerry Herman:' ),
            $lang,
            $chosen
        );
    }

    public static function dollyCss() {
        $output = <<< HELLODOLLY
	<style type='text/css'>
	#dolly {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #dolly {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#dolly,
		.rtl #dolly {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
HELLODOLLY;

        echo $output;
    }

}