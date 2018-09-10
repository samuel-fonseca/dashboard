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

class Directory
{


  /**
   * Main directory we are dealing with
   * 
   * @var string $_dir
   */
  protected static $_dir;

  protected static $_path;

  /**
   * Contents within directory
   * 
   * @var array
   */
  protected static $_content;

  protected static $_sort = false;

  protected static $_sort_order;


  public static function current_folder()
  {
    self::$_dir = getcwd();

    return new static;
  }

  public static function folder($folder_path)
  {
    self::$_dir = $folder_path;

    return new static;
  }

  public static function abspath()
  {
    return dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR;
  }

  public static function query($path)
  {
    self::$_dir = $path;

    return new static;
  }


  public static function target_folder($folder = '')
  {
    if( is_array($folder) )
    {
      self::$_dir = $folder;
    }
    else
    {
      self::$_dir = empty(self::$_dir) ?
                    dir($folder) :
                    dir(self::$_dir);
    }

    return new static;
  }

  /**
   * Create the proper path to the file
   * 
   * @return self
   */
  public static function read()
  {
    if( is_array(self::$_dir) )
    {
      $parent = self::$_dir['dirname'];
      $current = self::$_dir['basename'];
      $filename = self::$_dir['filename'];

      self::$_path = $parent . '/' . $current;
      self::$_dir = dir(self::$_path);
      
      return new static;
    }

    self::$_dir = pathinfo(self::$_dir);
    return self::read();
  }

  public static function get_path()
  {
    return self::$_path;
  }

  public static function sort( string $order )
  {
    self::$_sort = true;
    self::$_sort_order = $order;

    return new static;
  }
  
  public static function array_sort_order( array $array, string $order )
  {
    switch($order)
    {
      case 'asc':
      case 'ASC':
        sort($array);
        break;

      case 'desc':
      case 'DESC':
        krsort($array);
        break;

      default:
        sort($array);
        break;
    }

    return $array;
  }

  /**
   * Get list of folders/files in directory
   * 
   * @param array $path - should be response from `pathinfo()`
   * @return array
   */
  public static function list_folders()
  {
    $dirs = [];
    $files = [];

    while (($entry = self::$_dir->read()) !== false)
    {
      if ($entry != '.' && $entry != '..')
      {
        if (is_dir(self::$_path . '/' . $entry))
        {
          $dirs[] = $entry;
        }
        else
        {
          $files[] = [
            'name' => $entry,
            'size' => self::file_size(self::$_path . '/' . $entry),
            'icon' => self::file_icon(self::$_path . '/' . $entry)
          ];
        }
      }
    }

    if( self::$_sort )
    {
      self::array_sort_order($dirs, self::$_sort_order);
      self::array_sort_order($files, self::$_sort_order);
    }

    return [
      'dirs' => $dirs,
      'files' => $files
    ];
  }

  /**
   * Alternative to getting the file size
   * 
   * @return string
   */
  public static function file_size($file)
  {
    return self::format_bytes(filesize($file));
  }

  /**
   * Format file size to the correct unit
   * 
   * @see https://stackoverflow.com/a/2510459/1527252
   * 
   * @param int $bytes
   * @param int $precision
   * @return string
   */
  public static function format_bytes($bytes, $precision = 2)
  {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $bytes = max($bytes, 0);
    $pow = floor( ( $bytes ? log($bytes) : 0 ) / log(1024));
    $pow = min( $pow, count($units) - 1 );

    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
  }


  /**
   * Preset list of extensions and which Fontawesome icons
   * goes with them
   * 
   * @param string $path
   * @return string
   */
  public static function file_icon($path)
  {
    $ext = self::file_extension($path);

    switch( $ext )
    {
      case 'ico':
      case 'jpg':
      case 'jpeg':
      case 'png':
        return 'fas fa-file-image';
        break;

      case 'php':
        return 'fab fa-php';
        break;

      case 'htm':
      case 'html':
        return 'fab fa-html5';
        break;

      case 'css':
        return 'fab fa-css3-alt';
        break;

      case 'js':
        return 'fab fa-js';
        break;

      case 'java':
        return 'fab fa-java';
        break;

      case 'zip':
        return 'fas fa-file-archive';
        break;

      case 'pdf':
        return 'fas fa-file-pdf';
        break;

      case 'py':
        return 'fab fa-python';
        break;

      case 'rb':
      case 'cpp':
      case 'json':
        return 'fas fa-file-code';
        break;

      default:
        return 'fas fa-file';
        break;
    }
  }

  /**
   * Get file extension
   * 
   * @param string $path
   * @return string
   */
  public static function file_extension($path)
  {
    return pathinfo($path, PATHINFO_EXTENSION);
  }

  /**
   * Get total size of a directory
   * WARNING: function is TOO SLOW... I will leave it here if someone wants to attempt making it faster
   * 
   * @param string $dir (fullpath)
   * @return int
   */
  public static function directory_size($dir)
  {
    $size = 0;
    foreach( new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir)) as $file )
    {
      $size += $file->getSize();
    }

    return $size;
  }


  public static function assets($asset = '')
  {
    $asset = strpos($asset, '/', 0) !== false ?
              $asset :
              '/' . $asset;

    $path = explode('/', self::abspath() . 'assets' . $asset);

    foreach($path as $key => $folder)
    {
      if( $folder == 'assets' )
      {
        return Info::url($path[$key - 1] . '/' . $path[$key] . $asset, true);
      }
    }
  }

}
