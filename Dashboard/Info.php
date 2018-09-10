<?php
/**
 * Copyright 2018 Samuel Fonseca
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Dashboard;


class Info
{
  /**
   * Get the current protocol (https) of the request
   * 
   * @return string
   */
  public static function protocol()
  {
    if( array_key_exists('REQUEST_SCHEME', $_SERVER) )
    {
      return $_SERVER['REQUEST_SCHEME'];
    }

    return array_key_exists('HTTPS', $_SERVER) ? 'https' : 'http';
  }

  public static function is_https()
  {
    return (self::protocol() === 'https') ? true : false;
  }

  /**
   * Return the server's domain name
   * 
   * @param string $path
   * @return string
   */
  public static function url($path = '', $ignore_port = false)
  {
    $protocol = self::protocol();
    $domain = array_key_exists('SERVER_NAME', $_SERVER) ? $_SERVER['SERVER_NAME'] : $_SERVER['SERVER_ADDR'];
    $port = $ignore_port ? '' : ':' . $_SERVER['SERVER_PORT'];

    if( $path != '' )
      $path = mb_substr($path, 0, 1, 'utf-8') == '/' ? $path : '/' . $path;

    return $protocol . '://' . $domain . $port . $path;
  }

  /**
   * Local install folder for XAMPP's dashboard
   */
  public static function localpath()
  {
    $realpath = realpath(__DIR__);
    $folders = explode(DIRECTORY_SEPARATOR, $realpath);

    foreach( $folders as $k => $v )
    {
      if( strpos($v, 'dashboard') !== false )
      {
        $key = $k;
      }
    }

    return self::map_install_folder();
    return $folders[$key - 1];
    
    print_r($folders);

    return '1234';
  }

  public static function map_install_folder()
  {
    $parent = __DIR__ . '/..';
    return scandir($parent);
  }

  public static function dir_path($dir)
  {
    return $dir;
  }

  public static function user_agent()
  {
    return array_key_exists('HTTP_USER_AGENT', $_SERVER) ? $_SERVER['HTTP_USER_AGENT'] : '';
  }

  public static function system()
  {
    if( PHP_OS )
    {
      return [
        'system' => PHP_OS,
        'icon' => self::system_icon(PHP_OS)
      ];
    }
  }

  public static function guest_system()
  {
    $os = self::available_systems(self::platforms());
    $os['icon'] = self::system_icon($os['system']);

    return $os;
  }

  public static function browser()
  {
    $browser = [
      'name' => self::available_systems(self::browsers())
    ];
    $browser['icon'] = self::browser_icons($browser['name']);

    return $browser;
  }

  /**
   * Match the User Agent to an OS
   * 
   * @return array
   */
  protected static function available_systems(array $platform_array)
  {
    $os_platform = null;

    $os_platforms = $platform_array;

    foreach ( $os_platforms as $regex => $os )
      if( preg_match($regex, self::user_agent()) )
        $os_platform = $os;

    return $os_platform;
  }

  /**
   * List of OS systems
   * 
   * @return array
   */
  protected static function platforms()
  {
    return 
    /**
     * @see https://stackoverflow.com/a/18070424/1527252
     */
    $os_platforms = [
      '/windows nt 10/i' =>  [
        'system' => 'Windows',
        'version' => '10'
      ],
      '/windows nt 6.3/i' =>  [
        'system' => 'Windows',
        'version' => '8.1'
      ],
      '/windows nt 6.2/i' =>  [
        'system' => 'Windows',
        'version' => '8'
      ],
      '/windows nt 6.1/i' =>  [
        'system' => 'Windows',
        'version' => '7'
      ],
      '/windows nt 6.0/i' =>  [
        'system' => 'Windows',
        'version' => 'Vista'
      ],
      '/windows nt 5.2/i' =>  [
        'system' => 'Windows',
        'version' => 'Server 2003/XP x64'
      ],
      '/windows nt 5.1/i' =>  [
        'system' => 'Windows',
        'version' => 'XP'
      ],
      '/windows xp/i' =>  [
        'system' => 'Windows',
        'version' => 'XP'
      ],
      '/windows nt 5.0/i' =>  [
        'system' => 'Windows',
        'version' => '2000'
      ],
      '/windows me/i' =>  [
        'system' => 'Windows',
        'version' => 'ME'
      ],
      '/win98/i' =>  [
        'system' => 'Windows',
        'version' => '98'
      ],
      '/win95/i' =>  [
        'system' => 'Windows',
        'version' => '95'
      ],
      '/win16/i' =>  [
        'system' => 'Windows',
        'version' => '3.11'
      ],
      '/macintosh|mac os x/i' => [
        'system' => 'macOS',
        'version' => '10+',
      ],
      '/mac_powerpc/i' => [
        'system' => 'Mac OS',
        'version' => '9',
      ],
      '/linux/i' => [
        'system' => 'Linux',
        'version' => '',
      ],
      '/ubuntu/i' => [
        'system' => 'Ubuntu',
        'version' => '',
      ],
      '/iphone/i' => [
        'system' => 'iPhone',
        'version' => '',
      ],
      '/ipod/i' => [
        'system' => 'iPod',
        'version' => '',
      ],
      '/ipad/i' => [
        'system' => 'iPad',
        'version' => '',
      ],
      '/android/i' => [
        'system' => 'Android',
        'version' => '',
      ],
      '/blackberry/i' => [
        'system' => 'BlackBerry',
        'version' => '',
      ],
      '/webos/i' => [
        'system' => 'Mobile',
        'version' => '',
        ]
    ];
  }

  /**
   * List of available browsers
   */
  protected static function browsers()
  {
    return [
      '/msie/i'      => 'Internet Explorer',
      '/edge/i'      => 'Edge',
      '/firefox/i'   => 'Firefox',
      '/safari/i'    => 'Safari',
      '/chrome/i'    => 'Chrome',
      '/opera/i'     => 'Opera',
      '/netscape/i'  => 'Netscape',
      '/maxthon/i'   => 'Maxthon',
      '/konqueror/i' => 'Konqueror',
      '/mobile/i'    => 'Mobile'
    ];
  }

  /**
   * Get icon for system
   * 
   * @return string
   */
  public static function system_icon($system)
  {
    switch($system)
    {
      case 'Windows':
      case 'WINNT':
        return 'fab fa-windows';
        break;

      case 'Darwin':
      case 'macOS':
      case 'Mac OS X':
      case 'iOS':
      case 'iPad':
      case 'iPhone':
        return 'fab fa-apple';
        break;

      case 'Ubuntu':
      case 'Linux':
        return 'fab fa-linux';
        break;

      case 'Android':
        return 'fab fa-android';
        break;

      case 'Blackberry':
      case 'Mobile':
        return 'fas fa-mobile';
        break;
    }
  }

  public static function browser_icons($browser)
  {
    switch($browser)
    {
      case 'Internet Explorer':
      case 'Edge':
        return 'fab fa-edge';
        break;

      case 'Firefox':
        return 'fab fa-firefox';
        break;

      case 'Safari':
        return 'fab fa-safari';
        break;

      case 'Chrome':
        return 'fab fa-chrome';
        break;

      case 'Opera':
        return 'fab fa-opera';
        break;

    }
  }

  /**
   * Check if debuggin is enabled (creates cookie if doesn't find one)
   * 
   * @param bool $set_debug
   * @return bool
   */
  public function debugging()
  {
    $debug_cookie = array_key_exists('debug', $_COOKIE) ? $_COOKIE['debug'] : null;
    if( $debug_cookie )
      return $debug_cookie;
    else
      @setcookie('debug', 0, time() + (10 * 365 * 24 * 60 * 60), '/');
      return false;
  }

  public static function set_debugging($set_debug = 0)
  {
    $expire = time() + (10 * 365 * 24 * 60 * 60);
    return setcookie(
      'debug',
      $set_debug,
      $expire,
      '/'
    );
  }
  
}
