$(function () {
  'use strict';

  if ($('.datepicker').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('.datepicker').datepicker({
      format: "dd.mm.yyyy",
      todayHighlight: true,
      autoclose: true
    });
    $('.datepicker .today').datepicker('setDate', today);
  }
});