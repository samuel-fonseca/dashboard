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

namespace Dashboard\Views;

/**
 * Templating class not complex at all
 * All I do is point to the realpath of
 * the templating files.
 * 
 * @author brazucaz <samuel.fonseca96@gmail.com>
 */
class Template
{

  /**
   * General get() to get whatever file you need
   * 
   * @param string $file
   * @param string $ext
   * @return string
   */
  public function get(string $file, $ext = 'php')
  {
    $_path = __DIR__ . '/../../_template/' . $file . '.' . $ext;

    if( !file_exists( $_path ) )
    {
      throw new \Exception('Template file could not be found!');
    }

    return $_path;
  }
  
  /**
   * Alias for get()
   * 
   * @param string $file
   * @return string
   */
  public function path(string $file)
  {
    return $this->get($file);
  }

  /**
   * Static functions
   */

  public function header()
  {
    return $this->get('header');
  }

  public function footer()
  {
    return $this->get('footer');
  }

  public function navbar()
  {
    return $this->get('navbar');
  }

  public function modals()
  {
    return $this->get('modals');
  }

  public function server_info_sidebar()
  {
    return $this->get('server_info_sidebar');
  }

}
