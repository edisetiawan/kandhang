<?php

/**
 * ultra light captcha class
 *
 * @package     Open Classifieds
 * @subpackage  Core
 * @category    Helper
 * @author      Chema Garrido <chema@garridodiaz.com>
 * @license     GPL v3
 */

class captcha{

    /**
     * generates the image for the captcha
     * @param string $name, used in the session
     * @param int $width
     * @param int $height
     * @param string $baseList
     */
    public static function image($name='',$width=120,$height=40,$baseList = '0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        session_start();

        $length = mt_rand(3,5);//code length
        $lines  = mt_rand(1,5);//to make the image dirty
        $image  = @imagecreate($width, $height) or die('Cannot initialize GD!');
        $code   = ''; //code generated saved at session

        //base image with dirty lines
        for( $i=0; $i<$lines; $i++ ) {
           imageline($image, 
                 mt_rand(0,$width), mt_rand(0,$height), 
                 mt_rand(0,$width), mt_rand(0,$height), 
                 imagecolorallocate($image, mt_rand(150,255), mt_rand(150,255), mt_rand(150,255)));
        }

        //writting the chars
        for( $i=0, $x=0; $i<$length; $i++ ) {
           $actChar = substr($baseList, rand(0, strlen($baseList)-1), 1);
           $x += 10 + mt_rand(0,10);
           imagechar($image, mt_rand(4,5), $x, mt_rand(5,20), $actChar, 
              imagecolorallocate($image, mt_rand(0,155), mt_rand(0,155), mt_rand(0,155)));
           $code .= strtolower($actChar);
        }
           
        // prevent client side  caching
        header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", FALSE);
        header("Pragma: no-cache");
        header('Content-Type: image/jpeg');
        imagejpeg($image);
        imagedestroy($image);

        $_SESSION['captcha'.$name] = $code;
    }

    
    /**
     * gets the URL where the image is created
     * @param string $name for the session
     * @return string
     */
    public static function image_url($name='')
    {
        return 'img.php?salt='.$name;        
    }
    
    /**
     * check if its valid or not
     * @param string $name for the session
     * @return boolean 
     */
    public static function check($name='')
    {
    
        if  ($_SESSION['captcha'.$name]==strtolower($_POST['captcha']))
        {
            $_SESSION['captcha'.$name] = '';
            return TRUE;
        }   
        else return FALSE;
       
    }
    
    /**
     * check that there's no CSRF attack
     * @param  string $name the salt used to create the CSRF
     * @return boolean      
     */ 
    public static function check_CSRF($name='')
    {
        if ( (!empty($_SESSION['token_'.$name])) && (!empty($_POST['token_'.$name])) ) 
        {//echo $_SESSION['token_'.$name].'---'.$_POST['token_'.$name];
            if ($_SESSION['token_'.$name] == $_POST['token_'.$name]) 
            {
               return TRUE;
            }   
        }
        
        return FALSE;
    }

    /**
     * Creates CSRF token and the HTML tag
     * @param string $name salt allows us to have more than 1 form per page and to have more than 1 tab opened with different items
     * @return string
     */
    public static function CSRF($name='')
    {
        $token = md5($name.uniqid(rand(), TRUE));//unique form token
        $_SESSION['token_'.$name] = $token;
        return'<input type="hidden" name="token_'.$name.'" value="'.$token.'">';
    }

}