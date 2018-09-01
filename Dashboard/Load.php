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

use Dashboard\Info;

class Load
{
  /**
   * Full path to folder
   * 
   * @var string
   */
  public static $folder;

  /**
   * Provide the path to the folder
   * 
   * @param array $folder - provide the `pathinfo` of the directory
   * @return self
   */
  public static function folder( array $folder )
  {
    self::$folder = $folder;
    return new static;
  }

  /**
   * Get the contents of the folder
   * 
   * @return array
   */
  public static function get()
  {
    if( self::$folder )
    {
      return Info::folder_list(self::$folder);
    }

    return json_encode([
      'error' => true,
      'level' => 'warning',
      'folder' => self::$folder,
      'message' => 'Could not load folder'
    ]);
  }
}