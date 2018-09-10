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

 /*
 |-----------------------------------------------------------------------
 |  Functions (shortcuts to static functions)
 |-----------------------------------------------------------------------
 |
 | Present the user with shortcut for certain static functions
 | These functions are not needed to be instiated with their classes
 |
 */

// check for function before initiating it
if( !function_exists('url') )
{
  /**
   * Shortcut to URL function
   * 
   * @return Info::url()
   */
  function url()
  {
    return Dashboard\Info::url(...func_get_args());
  }
}

if( !function_exists('path') )
{
  /**
   * Shortcut to path function
   * 
   * @return Info::localpath()
   */
  function localpath()
  {
    return Dashboard\Info::localpath(...func_get_args());
  }
}

if( !function_exists('assets') )
{
  /**
   * Shortcut to assets function
   * 
   * @return Directory::assets()
   */
  function assets()
  {
    return Dashboard\Directory::assets(...func_get_args());
  }
}
