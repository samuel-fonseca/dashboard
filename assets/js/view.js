
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

// check server onload
window.onload = checkConnection();

// this will check server status every 30 seconds
setInterval(() => {
  checkConnection();
}, 15000);

/**
 * Check if localhost is ping(able)
 */
function checkConnection() {
  var status_div = document.querySelector('#connection_status');

  var loading = document.createElement('i');
  loading.className = 'fas fa-spinner fa-spin';
  status_div.appendChild(loading);

  fetch(window.location.href, {
    method: 'GET'
  })
  .then(response => {
    clearStatus(status_div);

    // status needed == 200
    if( response.status == 200 || response.status == 202 ) {
      serviceIsUp(status_div);
    } else {
      serviceIsDown(status_div);
    }

    status_div.innerHTML = '<small>' + response.statusText + '</small>';
  })
  // connection errors
  .catch(err => {
    console.error(err)
    status_div.classList.add('badge-danger');
    status_div.innerHTML = '<small>Unreachable</small>';
  });
}

/**
 * Remove badge classes from connection indicator
 * 
 * @param {HTMLElement} el 
 */
function clearStatus(el) {
  // clear classes
  el.classList.remove('badge-success');
  el.classList.remove('badge-danger');
  el.classList.remove('badge-warning');
  el.classList.remove('badge-light');
}

/**
 * Add green badge to connection indicator
 * 
 * @param {HTMLElement} el 
 */
function serviceIsUp(el) {
  el.classList.add('badge-success');
}

/**
 * Add red badge to connection indicator
 * 
 * @param {HTMLElement} el 
 */
function serviceIsDown(el) {
  el.classList.add('badge-danger');
}

/**
 * Hide text which is too large on the main page
 * sidebar
 */
(function() {
  String.prototype.trunc = String.prototype.trunc ||
  function(n) {
    return (this.length > n) ? this.substr(0, n-1) + ' &hellip;' : this;
  };

  var rows = document.querySelectorAll('.shorten-text');

  if( rows == 'undefined' || rows == null ) return;

  rows.forEach(el => {
    el.innerHTML = el.innerHTML.trunc(50);
    el.parentElement.parentElement.addEventListener('click', e => {
      el.innerHTML = el.getAttribute('data-original-text');
    });
  });
})();

/**
 * Enable tooltip
 */
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
