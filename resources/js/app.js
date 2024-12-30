import './bootstrap';
import './scripts';

import $ from 'jquery';
window.$ = window.jQuery = $; 

import 'jquery-mask-plugin'; 

$(document).ready(function() {
    $('.numeric-mask').mask('#.##0,00', {reverse: true});
});