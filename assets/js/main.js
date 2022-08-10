$(document).ready(function () {
  $("#ValidateData").click(function () {
    if (!$("#url").val()) {
      $(".error").text("Please complete Fields");
      $(".error").show();
    } else {
      url = $("#url").val();
      request = $.ajax({
        url: "shorter.php",
        type: "post",
        data: "url=" + url,
        success: function (result) {
          $(".short").hide();
          $("#GetShortLink").show();
          $("#LongUrl").text(url);
          $("#LongUrl").prop("href", url);
          $("#ShortLink").val(result);

          $("#CopyShort").click(function () {
            navigator.clipboard.writeText(result);
          });
        },
      });
    }
  });

  $("form").attr("onsubmit", "return false");
});
